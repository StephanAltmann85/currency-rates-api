<?php

declare(strict_types=1);

namespace App\Tests\unit\Collector\Currency;

use App\Collector\Currency\Collector;
use App\Collector\Currency\RateCollectorInterface;
use App\Entity\Currency;
use Doctrine\Common\Collections\ArrayCollection;
use Mockery\Adapter\Phpunit\MockeryTestCase;

/**
 * @coversDefaultClass \App\Collector\Currency\Collector
 **/
class CollectorTest extends MockeryTestCase
{
    private Collector $collector;

    /**
     * @covers ::__construct
     * @covers ::collect
     */
    public function testCollect(): void
    {
        $rateCollector1 = \Mockery::mock(RateCollectorInterface::class);
        $rateCollector2 = \Mockery::mock(RateCollectorInterface::class);
        $rateCollector3 = \Mockery::mock(RateCollectorInterface::class);

        $currency1 = \Mockery::mock(Currency::class);
        $currency2 = \Mockery::mock(Currency::class);
        $currency3 = \Mockery::mock(Currency::class);

        /* @phpstan-ignore-next-line */
        $this->collector = new Collector([$rateCollector1, $rateCollector2, $rateCollector3]);

        $rateCollector1
            ->shouldReceive('collect')
            ->once()
            ->andReturn(new ArrayCollection([$currency1]));

        $rateCollector2
            ->shouldReceive('collect')
            ->once()
            ->andReturn(new ArrayCollection([$currency2, $currency3]));

        $rateCollector3
            ->shouldReceive('collect')
            ->once()
            ->andReturn(new ArrayCollection());

        $result = $this->collector->collect();

        $this->assertCount(3, $result);
        $this->assertEquals($currency1, $result->get(0));
        $this->assertEquals($currency2, $result->get(1));
        $this->assertEquals($currency3, $result->get(2));
    }
}
