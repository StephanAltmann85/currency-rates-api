<?php

declare(strict_types=1);

namespace App\Tests\unit\EventListener;

use App\Entity\Currency;
use App\Entity\CurrencyRateHistory;
use App\EventListener\CurrencyUpdateEventListener;
use Doctrine\ORM\EntityManagerInterface;
use Doctrine\ORM\Event\OnFlushEventArgs;
use Doctrine\ORM\Mapping\ClassMetadata;
use Doctrine\ORM\UnitOfWork;
use Mockery\Adapter\Phpunit\MockeryTestCase;

/**
 * @coversDefaultClass \App\EventListener\CurrencyUpdateEventListener
 **/
class CurrencyUpdateEventListenerTest extends MockeryTestCase
{
    private CurrencyUpdateEventListener $listener;

    public function setUp(): void
    {
        $this->listener = new CurrencyUpdateEventListener();

        parent::setUp();
    }

    /**
     * @covers ::onUpdate
     */
    public function testOnUpdate(): void
    {
        $currency = \Mockery::mock(Currency::class);

        $currency
            ->shouldReceive('setUpdatedAt')
            ->once()
            ->andReturn($currency);

        $this->listener->onUpdate($currency);
    }

    /**
     * @covers ::onFlush
     */
    public function testOnFlush(): void
    {
        $event = \Mockery::mock(OnFlushEventArgs::class);
        $entityManager = \Mockery::mock(EntityManagerInterface::class);
        $unitOfWork = \Mockery::mock(UnitOfWork::class);

        $currency1 = \Mockery::mock(Currency::class);
        $currency2 = \Mockery::mock(Currency::class);
        $currency3 = \Mockery::mock(Currency::class);

        $event
            ->shouldReceive('getObjectManager')
            ->once()
            ->andReturn($entityManager);

        $entityManager
            ->shouldReceive('getUnitOfWork')
            ->once()
            ->andReturn($unitOfWork);

        $unitOfWork
            ->shouldReceive('getScheduledEntityUpdates')
            ->once()
            ->andReturn([\Mockery::mock(CurrencyRateHistory::class), $currency1, $currency2, $currency3]);

        $unitOfWork
            ->shouldReceive('getEntityChangeSet')
            ->once()
            ->with($currency1)
            ->andReturn(null);

        $unitOfWork
            ->shouldReceive('getEntityChangeSet')
            ->once()
            ->with($currency2)
            ->andReturn([]);

        $unitOfWork
            ->shouldReceive('getEntityChangeSet')
            ->once()
            ->with($currency3)
            ->andReturn(['rate' => [1, 1.2]]);

        $currency3
            ->shouldReceive('getUpdatedAt')
            ->once()
            ->andReturn(new \DateTime());

        $entityManager
            ->shouldReceive('persist')
            ->once();

        $classMetadata = \Mockery::mock(ClassMetadata::class);

        $entityManager
            ->shouldReceive('getClassMetadata')
            ->once()
            ->with(CurrencyRateHistory::class)
            ->andReturn($classMetadata);

        $unitOfWork
            ->shouldReceive('computeChangeSet')
            ->once()
            ->with($classMetadata, \Mockery::type(CurrencyRateHistory::class));

        $this->listener->onFlush($event);
    }
}
