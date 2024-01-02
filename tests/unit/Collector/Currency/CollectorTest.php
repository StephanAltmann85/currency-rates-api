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
    /**
     * @covers ::__construct
     * @covers ::collect
     */
    public function testCollect(): void
    {
        $rateCollector1 = \Mockery::mock(RateCollectorInterface::class);
        $rateCollector2 = \Mockery::mock(RateCollectorInterface::class);
        $rateCollector3 = \Mockery::mock(RateCollectorInterface::class);

        /* @phpstan-ignore-next-line */
        $collector = new Collector([$rateCollector1, $rateCollector2, $rateCollector3]);

        $currency1 = \Mockery::mock(Currency::class);
        $currency2 = \Mockery::mock(Currency::class);
        $currency3 = \Mockery::mock(Currency::class);

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

        $result = $collector->collect();

        $this->assertCount(3, $result);
        $this->assertEquals($currency1, $result->get(0));
        $this->assertEquals($currency2, $result->get(1));
        $this->assertEquals($currency3, $result->get(2));
    }

    /**
     * @covers ::__construct
     * @covers ::collect
     */
    public function testCollectWithExclusiveChannel(): void
    {
        $rateCollector1 = \Mockery::mock(RateCollectorInterface::class);
        $rateCollector2 = \Mockery::mock(RateCollectorInterface::class);
        $rateCollector3 = \Mockery::mock(RateCollectorInterface::class);

        /* @phpstan-ignore-next-line */
        $collector = new Collector([$rateCollector1, $rateCollector2, $rateCollector3]);

        $currency1 = \Mockery::mock(Currency::class);

        $rateCollector1
            ->shouldReceive('collect')
            ->once()
            ->andReturn(new ArrayCollection([$currency1]));

        $rateCollector1
            ->shouldReceive('getChannel')
            ->once()
            ->andReturn('TEST');

        $rateCollector2
            ->shouldReceive('collect')
            ->never();

        $rateCollector2
            ->shouldReceive('getChannel')
            ->once()
            ->andReturn('NO');

        $rateCollector3
            ->shouldReceive('collect')
            ->never();

        $rateCollector3
            ->shouldReceive('getChannel')
            ->once()
            ->andReturn('NO');

        $result = $collector->collect('TEST');

        $this->assertCount(1, $result);
        $this->assertEquals($currency1, $result->get(0));
    }
}
