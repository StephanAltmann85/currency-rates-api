<?php

declare(strict_types=1);

namespace App\Tests\unit\Collector\Currency;

use App\Collector\Currency\Collector;
use App\Collector\Currency\Dto\CurrencyRateInterface;
use App\Collector\Currency\Filter\AttributeFilter;
use App\Collector\Currency\RateCollectorInterface;
use App\Collector\Exception\TransportException;
use App\Entity\Currency;
use App\Repository\CurrencyRepository;
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

    /** @phpstan-var CurrencyRepository|MockInterface  */
    private CurrencyRepository $currencyRepository;

    /** @phpstan-var AttributeFilter|MockInterface  */
    private AttributeFilter $currencyRateAttributeFilter;

    public function setUp(): void
    {
        $this->logger = \Mockery::mock(LoggerInterface::class);
        $this->currencyRepository = \Mockery::mock(CurrencyRepository::class);
        $this->currencyRateAttributeFilter = \Mockery::mock(AttributeFilter::class);

        parent::setUp();
    }

    public function testCollect(): void
    {
        $rateCollector1 = \Mockery::mock(RateCollectorInterface::class);
        $rateCollector2 = \Mockery::mock(RateCollectorInterface::class);
        $rateCollector3 = \Mockery::mock(RateCollectorInterface::class);
        $rateCollector4 = \Mockery::mock(RateCollectorInterface::class);

        $collector = new Collector(
            [$rateCollector1, $rateCollector2, $rateCollector3, $rateCollector4],
            $this->logger,
            $this->currencyRepository,
            $this->currencyRateAttributeFilter
        );

        $currencyRate1 = \Mockery::mock(CurrencyRateInterface::class);
        $currencyRate2 = \Mockery::mock(CurrencyRateInterface::class);
        $currencyRate3 = \Mockery::mock(CurrencyRateInterface::class);

        $currency1 = \Mockery::mock(Currency::class);
        $currency2 = \Mockery::mock(Currency::class);
        $currency3 = \Mockery::mock(Currency::class);

        $collection1 = new ArrayCollection([$currencyRate1]);
        $collection2 = new ArrayCollection([$currencyRate2, $currencyRate3]);
        $collection3 = new ArrayCollection();

        $currencyRate1
            ->shouldReceive('getIso3')
            ->once()
            ->andReturn('CR1');

        $currencyRate2
            ->shouldReceive('getIso3')
            ->once()
            ->andReturn('CR2');

        $currencyRate3
            ->shouldReceive('getIso3')
            ->once()
            ->andReturn('CR3');

        $currencyRate1
            ->shouldReceive('getRate')
            ->once()
            ->andReturn(1);

        $currencyRate2
            ->shouldReceive('getRate')
            ->once()
            ->andReturn(2);

        $currencyRate3
            ->shouldReceive('getRate')
            ->once()
            ->andReturn(3);

        $currency1
            ->shouldReceive('setRate')
            ->once()
            ->with(1)
            ->andReturnSelf();

        $currency2
            ->shouldReceive('setRate')
            ->once()
            ->with(2)
            ->andReturnSelf();

        $currency3
            ->shouldReceive('setRate')
            ->once()
            ->with(3)
            ->andReturnSelf();

        $currency1
            ->shouldReceive('getIso3')
            ->once()
            ->andReturn('CR1');

        $currency2
            ->shouldReceive('getIso3')
            ->once()
            ->andReturn('CR2');

        $currency3
            ->shouldReceive('getIso3')
            ->once()
            ->andReturn('CR3');

        $rateCollector1
            ->shouldReceive('collect')
            ->once()
            ->andReturn($collection1);

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
            ->andReturn($collection2);

        $rateCollector4
            ->shouldReceive('collect')
            ->once()
            ->andReturn($collection3);

        $this->currencyRateAttributeFilter
            ->shouldReceive('filter')
            ->once()
            ->with($rateCollector1, $collection1)
            ->andReturn($collection1);

        $this->currencyRateAttributeFilter
            ->shouldReceive('filter')
            ->once()
            ->with($rateCollector3, $collection2)
            ->andReturn($collection2);

        $this->currencyRateAttributeFilter
            ->shouldReceive('filter')
            ->once()
            ->with($rateCollector4, $collection3)
            ->andReturn($collection3);

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

        $this->currencyRepository
            ->shouldReceive('findOrCreate')
            ->once()
            ->with('CR1')
            ->andReturn($currency1);

        $this->currencyRepository
            ->shouldReceive('findOrCreate')
            ->once()
            ->with('CR2')
            ->andReturn($currency2);

        $this->currencyRepository
            ->shouldReceive('findOrCreate')
            ->once()
            ->with('CR3')
            ->andReturn($currency3);

        $result = $collector->collect();

        $this->assertCount(3, $result);
        $this->assertEquals($currency1, $result->get('CR1'));
        $this->assertEquals($currency2, $result->get('CR2'));
        $this->assertEquals($currency3, $result->get('CR3'));
    }

    public function testCollectWithExclusiveChannel(): void
    {
        $rateCollector1 = \Mockery::mock(RateCollectorInterface::class);
        $rateCollector2 = \Mockery::mock(RateCollectorInterface::class);
        $rateCollector3 = \Mockery::mock(RateCollectorInterface::class);

        $collector = new Collector(
            [$rateCollector1, $rateCollector2, $rateCollector3],
            $this->logger,
            $this->currencyRepository,
            $this->currencyRateAttributeFilter
        );

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
