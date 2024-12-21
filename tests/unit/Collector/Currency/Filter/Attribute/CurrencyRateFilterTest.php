<?php

declare(strict_types=1);

namespace App\Tests\unit\Collector\Currency\Filter\Attribute;

use App\Collector\Currency\Filter\Attribute\CurrencyRateFilter;
use App\Collector\Currency\Filter\Enum\FilterType;
use PHPUnit\Framework\Attributes\CoversClass;
use PHPUnit\Framework\TestCase;

#[CoversClass(CurrencyRateFilter::class)]
class CurrencyRateFilterTest extends TestCase
{
    public function testInstantiation(): void
    {
        $attribute = new CurrencyRateFilter(FilterType::WHITELIST, ['CR1']);

        $this->assertEquals(['CR1'], $attribute->currencies);
        $this->assertEquals(FilterType::WHITELIST, $attribute->filterType);
    }
}
