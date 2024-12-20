<?php

declare(strict_types=1);

namespace App\Collector\Currency\Filter\Attribute;

use App\Collector\Currency\Filter\Enum\FilterType;
use Attribute;

#[Attribute(Attribute::TARGET_CLASS)]
readonly class CurrencyRateFilter
{
    /**
     * @param string[] $currencies
     */
    public function __construct(
        public FilterType $filterType,
        public array $currencies,
    ) {
    }
}