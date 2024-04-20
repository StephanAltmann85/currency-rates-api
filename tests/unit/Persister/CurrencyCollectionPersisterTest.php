<?php

declare(strict_types=1);

namespace App\Tests\unit\Persister;

use App\Entity\Currency;
use App\Persister\CurrencyCollectionPersister;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\EntityManagerInterface;
use Mockery\Adapter\Phpunit\MockeryTestCase;
use PHPUnit\Framework\Attributes\CoversClass;

#[CoversClass(CurrencyCollectionPersister::class)]
class CurrencyCollectionPersisterTest extends MockeryTestCase
{
    public function testPersist(): void
    {
        $entityManager = \Mockery::mock(EntityManagerInterface::class);
        $persister = new CurrencyCollectionPersister($entityManager);

        $currency1 = \Mockery::mock(Currency::class);
        $currency2 = \Mockery::mock(Currency::class);
        /** @phpstan-var Collection<int, Currency> $currencyCollection */
        $currencyCollection = new ArrayCollection([$currency1, $currency2]);

        $entityManager
            ->shouldReceive('persist')
            ->once()
            ->with($currency1);

        $entityManager
            ->shouldReceive('persist')
            ->once()
            ->with($currency2);

        $entityManager
            ->shouldReceive('flush')
            ->once();

        $persister->persist($currencyCollection);
    }
}
