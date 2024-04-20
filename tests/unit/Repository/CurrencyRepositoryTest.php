<?php

declare(strict_types=1);

namespace App\Tests\unit\Repository;

use App\Entity\Currency;
use App\Repository\CurrencyRepository;
use Doctrine\ORM\EntityManagerInterface;
use Doctrine\ORM\Mapping\ClassMetadata;
use Mockery\Adapter\Phpunit\MockeryTestCase;
use Mockery\MockInterface;
use PHPUnit\Framework\Attributes\CoversClass;
use PHPUnit\Framework\Attributes\UsesClass;
use Symfony\Bridge\Doctrine\ManagerRegistry;

#[CoversClass(CurrencyRepository::class)]
#[UsesClass(Currency::class)]
class CurrencyRepositoryTest extends MockeryTestCase
{
    private CurrencyRepository $repository;

    /** @phpstan-var ManagerRegistry|MockInterface  */
    private ManagerRegistry $registry;

    /** @phpstan-var EntityManagerInterface|MockInterface  */
    private EntityManagerInterface $entityManager;

    public function setUp(): void
    {
        $this->registry = \Mockery::mock(ManagerRegistry::class);
        $this->repository = new CurrencyRepository($this->registry);

        $this->entityManager = \Mockery::mock(EntityManagerInterface::class);

        parent::setUp();
    }

    public function testInstantiation(): void
    {
        $this->assertInstanceOf(CurrencyRepository::class, $this->repository);
    }

    public function testFindOrCreate(): void
    {
        $classMetadata = new ClassMetadata(Currency::class);

        $this->registry
            ->shouldReceive('getManagerForClass')
            ->once()
            ->with(Currency::class)
            ->andReturn($this->entityManager);

        $this->entityManager
            ->shouldReceive('getClassMetadata')
            ->once()
            ->with(Currency::class)
            ->andReturn($classMetadata);

        $currency = \Mockery::mock(Currency::class);

        $this->entityManager
            ->shouldReceive('find')
            ->once()
            ->with(Currency::class, 'NIL', null, null)
            ->andReturn(null);

        $result = $this->repository->findOrCreate('NIL');

        $this->assertInstanceOf(Currency::class, $result);
        $this->assertEquals('NIL', $result->getIso3());

        $this->entityManager
            ->shouldReceive('find')
            ->once()
            ->with(Currency::class, 'USD', null, null)
            ->andReturn($currency);

        $result = $this->repository->findOrCreate('USD');

        $this->assertInstanceOf(Currency::class, $result);
        $this->assertEquals($currency, $result);
    }
}
