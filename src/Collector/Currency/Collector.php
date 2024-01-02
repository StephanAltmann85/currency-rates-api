<?php

declare(strict_types=1);

namespace App\Collector\Currency;

use App\Collector\Exception\CollectDataException;
use App\Entity\Currency;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Symfony\Component\DependencyInjection\Attribute\TaggedIterator;

class Collector
{
    /**
     * @param RateCollectorInterface[] $collectors
     */
    public function __construct(
        #[TaggedIterator('currency.rate_collector', defaultPriorityMethod: 'getPriority')]
        private readonly iterable $collectors
    ) {
    }

    /**
     * @return Collection<int, Currency>
     *
     * @throws CollectDataException
     */
    public function collect(string $channel = null): Collection
    {
        // TODO: may move to command for error output or return struct with error details
        $currencies = new ArrayCollection();

        foreach ($this->collectors as $collector) {
            if (null !== $channel && $channel !== $collector->getChannel()) {
                continue;
            }

            $currencies = new ArrayCollection(array_merge($currencies->toArray(), $collector->collect()->toArray()));
        }

        return $currencies;
    }
}
