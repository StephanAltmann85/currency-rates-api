<?php

declare(strict_types=1);

namespace App\Tests\unit\Collector\Currency;

use App\Collector\Currency\Collector;
use App\Collector\Currency\RateCollectorInterface;
use App\Collector\Exception\TransportException;
use App\Entity\Currency;
use Doctrine\Common\Collections\ArrayCollection;
use Mockery\Adapter\Phpunit\MockeryTestCase;
use Mockery\MockInterface;
use PHPUnit\Framework\Attributes\CoversClass;
use Psr\Log\LoggerInterface;

#[CoversClass(Collector::class)]
class CollectorTest extends MockeryTestCase
{
    /** @phpstan-var LoggerInterface|MockInterface  */
    private LoggerInterface $logger;

    public function setUp(): void
    {
        $this->logger = \Mockery::mock(LoggerInterface::class);

        parent::setUp();
    }

    public function testCollect(): void
    {
        $rateCollector1 = \Mockery::mock(RateCollectorInterface::class);
        $rateCollector2 = \Mockery::mock(RateCollectorInterface::class);
        $rateCollector3 = \Mockery::mock(RateCollectorInterface::class);
        $rateCollector4 = \Mockery::mock(RateCollectorInterface::class);

        $collector = new Collector([$rateCollector1, $rateCollector2, $rateCollector3, $rateCollector4], $this->logger);

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
            ->andThrows(new TransportException('Error!'));

        $rateCollector2
            ->shouldReceive('getChannel')
            ->once()
            ->andReturn('ERROR-CHANNEL');

        $rateCollector3
            ->shouldReceive('collect')
            ->once()
            ->andReturn(new ArrayCollection([$currency2, $currency3]));

        $rateCollector4
            ->shouldReceive('collect')
            ->once()
            ->andReturn(new ArrayCollection());

        $this->logger
            ->shouldReceive('error')
            ->once()
            ->with(
                'An error occurred while collecting currency rates!',
                [
                    'channel' => 'ERROR-CHANNEL',
                    'message' => 'Error!',
                ]
            );

        $result = $collector->collect();

        $this->assertCount(3, $result);
        $this->assertEquals($currency1, $result->get(0));
        $this->assertEquals($currency2, $result->get(1));
        $this->assertEquals($currency3, $result->get(2));
    }

    public function testCollectWithExclusiveChannel(): void
    {
        $rateCollector1 = \Mockery::mock(RateCollectorInterface::class);
        $rateCollector2 = \Mockery::mock(RateCollectorInterface::class);
        $rateCollector3 = \Mockery::mock(RateCollectorInterface::class);

        $collector = new Collector([$rateCollector1, $rateCollector2, $rateCollector3], $this->logger);

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

        $this->logger
            ->shouldReceive('error')
            ->never();

        $result = $collector->collect('TEST');

        $this->assertCount(1, $result);
        $this->assertEquals($currency1, $result->get(0));
    }
}
