<?php

declare(strict_types=1);

namespace App\Tests\unit\Repository;

use App\Repository\CurrencyRateHistoryRepository;
use Mockery\Adapter\Phpunit\MockeryTestCase;
use Symfony\Bridge\Doctrine\ManagerRegistry;

/**
 * @coversDefaultClass \App\Repository\CurrencyRateHistoryRepository
 **/
class CurrencyRateHistoryRepositoryTest extends MockeryTestCase
{
    /**
     * @covers ::__construct
     */
    public function testInstantiation(): void
    {
        $registry = \Mockery::mock(ManagerRegistry::class);

        $repository = new CurrencyRateHistoryRepository($registry);

        $this->assertInstanceOf(CurrencyRateHistoryRepository::class, $repository);
    }
}
