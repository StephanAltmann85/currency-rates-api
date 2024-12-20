<?php

declare(strict_types=1);

namespace App\Tests\unit\Collector\Currency\Filter;

use App\Collector\Currency\Channel\Ecb\Response\Dto\CurrencyRate;
use App\Collector\Currency\Filter\CurrencyRateAttributeFilter;
use App\Collector\Exception\CollectDataException;
use App\Tests\Mock\Collector\Currency\Channel\RateCollectorBlacklistFilter;
use App\Tests\Mock\Collector\Currency\Channel\RateCollectorNoFilter;
use App\Tests\Mock\Collector\Currency\Channel\RateCollectorWhitelistFilter;
use PHPUnit\Framework\Attributes\CoversClass;
use PHPUnit\Framework\Attributes\UsesClass;
use PHPUnit\Framework\TestCase;

#[CoversClass(CurrencyRateAttributeFilter::class)]
#[UsesClass(CurrencyRate::class)]
class CurrencyRateAttributeFilterTest extends TestCase
{
    private CurrencyRateAttributeFilter $filter;

    public function setUp(): void
    {
        $this->filter = new CurrencyRateAttributeFilter();
        parent::setUp();
    }

    /**
     * @throws CollectDataException
     */
    public function testNoFilter(): void
    {
        $rateCollector = new RateCollectorNoFilter();

        $result = $this->filter->filter($rateCollector, $rateCollector->collect());

        $this->assertCount(6, $result);
        $this->assertEquals($rateCollector->collect(), $result);
    }

    /**
     * @throws CollectDataException
     */
    public function testWhitelistFilter(): void
    {
        $rateCollector = new RateCollectorWhitelistFilter();

        $result = $this->filter->filter($rateCollector, $rateCollector->collect());

        $this->assertCount(4, $result);
        $this->assertNull($result->offsetGet(0));
        $this->assertNull($result->offsetGet(1));
        $this->assertEquals('CR3', $result->offsetGet(2)?->getIso3());
        $this->assertEquals('CR4', $result->offsetGet(3)?->getIso3());
        $this->assertEquals('CR5', $result->offsetGet(4)?->getIso3());
        $this->assertEquals('CR6', $result->offsetGet(5)?->getIso3());
    }

    /**
     * @throws CollectDataException
     */
    public function testBlacklistFilter(): void
    {
        $rateCollector = new RateCollectorBlacklistFilter();

        $result = $this->filter->filter($rateCollector, $rateCollector->collect());

        $this->assertCount(2, $result);
        $this->assertNull($result->offsetGet(0));
        $this->assertNull($result->offsetGet(1));
        $this->assertNull($result->offsetGet(2));
        $this->assertNull($result->offsetGet(3));
        $this->assertEquals('CR5', $result->offsetGet(4)?->getIso3());
        $this->assertEquals('CR6', $result->offsetGet(5)?->getIso3());
    }
}
