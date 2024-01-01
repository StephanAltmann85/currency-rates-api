<?php

declare(strict_types=1);

namespace App\Collector\Currency;

use App\Collector\Exception\CollectDataException;
use App\Entity\Currency;
use Doctrine\Common\Collections\Collection;
use Symfony\Component\DependencyInjection\Attribute\AutoconfigureTag;

#[AutoconfigureTag('currency.rate_collector')]
interface RateCollectorInterface
{
    /**
     * @throws CollectDataException
     *
     * @phpstan-return Collection<int, Currency>
     */
    public function collect(): Collection;

    public function getChannel(): string;

    public static function getPriority(): int;
}
