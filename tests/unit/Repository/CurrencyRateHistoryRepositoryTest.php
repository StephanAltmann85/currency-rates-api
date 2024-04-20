<?php

declare(strict_types=1);

namespace App\Tests\unit\Repository;

use App\Repository\CurrencyRateHistoryRepository;
use Mockery\Adapter\Phpunit\MockeryTestCase;
use PHPUnit\Framework\Attributes\CoversClass;
use Symfony\Bridge\Doctrine\ManagerRegistry;

#[CoversClass(CurrencyRateHistoryRepository::class)]
class CurrencyRateHistoryRepositoryTest extends MockeryTestCase
{
    public function testInstantiation(): void
    {
        $registry = \Mockery::mock(ManagerRegistry::class);

        $repository = new CurrencyRateHistoryRepository($registry);

        $this->assertInstanceOf(CurrencyRateHistoryRepository::class, $repository);
    }
}
