<?php

declare(strict_types=1);

namespace App\Collector\Currency;

use App\Collector\Exception\CollectDataException;
use App\Entity\Currency;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Psr\Log\LoggerInterface;
use Symfony\Component\DependencyInjection\Attribute\TaggedIterator;

class Collector
{
    /**
     * @param RateCollectorInterface[] $collectors
     */
    public function __construct(
        #[TaggedIterator('currency.rate_collector', defaultPriorityMethod: 'getPriority')]
        private readonly iterable $collectors,
        private readonly LoggerInterface $currencyRatesUpdateLogger
    ) {
    }

    /**
     * @return Collection<int, Currency>
     */
    public function collect(string $channel = null): Collection
    {
        $currencies = new ArrayCollection();

        foreach ($this->collectors as $collector) {
            if (null !== $channel && $channel !== $collector->getChannel()) {
                continue;
            }

            try {
                $currencies = new ArrayCollection(array_merge($currencies->toArray(), $collector->collect()->toArray()));
            } catch (CollectDataException $exception) {
                $this->currencyRatesUpdateLogger->error(
                    'An error occurred while collecting currency rates!',
                    [
                        'channel' => $collector->getChannel(),
                        'message' => $exception->getMessage(),
                    ]
                );
            }
        }

        return $currencies;
    }
}
