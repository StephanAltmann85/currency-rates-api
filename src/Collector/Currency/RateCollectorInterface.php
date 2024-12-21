<?php

declare(strict_types=1);

namespace App\Collector\Currency;

use App\Collector\Currency\Response\CurrencyRateInterface;
use App\Collector\Exception\CollectDataException;
use Doctrine\Common\Collections\Collection;
use Symfony\Component\DependencyInjection\Attribute\AutoconfigureTag;

#[AutoconfigureTag('currency.rate_collector')]
interface RateCollectorInterface
{
    /**
     * @throws CollectDataException
     *
     * @phpstan-return Collection<int, CurrencyRateInterface>
     */
    public function collect(): Collection;

    public function getChannel(): string;

    public static function getPriority(): int;
}
