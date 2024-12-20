<?php

declare(strict_types=1);

namespace App\Tests\integration\Mock\Collector\Currency\Channel;

use App\Collector\Currency\Channel\Ecb\Response\Dto\CurrencyRate;
use App\Collector\Currency\Filter\Attribute\CurrencyRateFilter;
use App\Collector\Currency\Filter\Enum\FilterType;
use App\Collector\Currency\RateCollectorInterface;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;

#[CurrencyRateFilter(FilterType::BLACKLIST, ['CR1', 'CR2', 'CR3', 'CR4'])]
class RateCollectorBlacklistFilter implements RateCollectorInterface
{
    public function collect(): Collection
    {
        return new ArrayCollection(
            [
                (new CurrencyRate())->setIso3('CR1')->setRate(3),
                (new CurrencyRate())->setIso3('CR2')->setRate(3),
                (new CurrencyRate())->setIso3('CR3')->setRate(3),
                (new CurrencyRate())->setIso3('CR4')->setRate(3),
                (new CurrencyRate())->setIso3('CR5')->setRate(3),
                (new CurrencyRate())->setIso3('CR6')->setRate(3),
            ]
        );
    }

    public function getChannel(): string
    {
        return 'mock_blacklist_filter';
    }

    public static function getPriority(): int
    {
        return 3;
    }
}
