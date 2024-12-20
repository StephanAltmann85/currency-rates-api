<?php

declare(strict_types=1);

namespace App\Tests\integration\Collector\Currency;

use App\Collector\Currency\Channel\Ecb\RateCollector;
use App\Collector\Currency\Channel\Ecb\Response\Dto\CurrencyRate;
use App\Collector\Currency\Channel\Ecb\Response\GetRatesResponse;
use App\Collector\Currency\Collector;
use App\Collector\Currency\Filter\CurrencyRateAttributeFilter;
use App\Entity\Currency;
use App\EventListener\CurrencyUpdateEventListener;
use App\Repository\CurrencyRepository;
use App\Tests\integration\Mock\Collector\Currency\Channel\RateCollectorBlacklistFilter;
use App\Tests\integration\Mock\Collector\Currency\Channel\RateCollectorNoFilter;
use App\Tests\integration\Mock\Collector\Currency\Channel\RateCollectorWhitelistFilter;
use App\Tests\integration\Mock\MockedRateCollector;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Mockery;
use PHPUnit\Framework\Attributes\CoversClass;
use PHPUnit\Framework\Attributes\UsesClass;
use PHPUnit\Framework\MockObject\Exception;
use Psr\Log\LoggerInterface;
use Symfony\Bundle\FrameworkBundle\Test\KernelTestCase;

#[CoversClass(CurrencyRateAttributeFilter::class)]
#[CoversClass(CurrencyRateAttributeFilter::class)]
#[UsesClass(Collector::class)]
#[UsesClass(CurrencyRate::class)]
#[UsesClass(GetRatesResponse::class)]
#[UsesClass(CurrencyRepository::class)]
#[UsesClass(CurrencyUpdateEventListener::class)]
#[UsesClass(Currency::class)]
class CollectorWithAttributeFilterTest extends KernelTestCase
{
    use Mockery\Adapter\Phpunit\MockeryPHPUnitIntegration;

    private LoggerInterface $logger;
    private CurrencyRepository $repository;

    public function setUp(): void
    {
        self::bootKernel();
        $container = static::getContainer();

        $this->logger = $container->get(LoggerInterface::class);

        /** @var CurrencyRepository $repository */
        $this->repository = $container->get(CurrencyRepository::class);

        parent::setUp();
    }

    public function testCollect(): void
    {
        $collector = new Collector(
            [
                new RateCollectorNoFilter(),
                new RateCollectorWhitelistFilter(),
                new RateCollectorBlacklistFilter()
            ],
            $this->logger,
            $this->repository,
            new CurrencyRateAttributeFilter()
        );

        $result = $collector->collect();

        $this->assertInstanceOf(Collection::class, $result);
        $this->assertContainsOnlyInstancesOf(Currency::class, $result);
        $this->assertCount(6, $result);
        $this->assertEquals(1, $result->get('CR1')->getRate());
        $this->assertEquals(1, $result->get('CR2')->getRate());
        $this->assertEquals(2, $result->get('CR3')->getRate());
        $this->assertEquals(2, $result->get('CR4')->getRate());
        $this->assertEquals(3, $result->get('CR5')->getRate());
        $this->assertEquals(3, $result->get('CR6')->getRate());
    }

    public function testCollectWithEmptyResult(): void
    {
        $rateCollector = Mockery::mock(RateCollector::class);

        $collector = new Collector(
            [$rateCollector],
            $this->logger,
            $this->repository,
            new CurrencyRateAttributeFilter()
        );

        $rateCollector
            ->shouldReceive('collect')
            ->once()
            ->andReturn(new ArrayCollection());

        $result = $collector->collect();

        $this->assertInstanceOf(Collection::class, $result);
        $this->assertCount(0, $result);
    }
}
