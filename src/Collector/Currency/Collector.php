<?php

declare(strict_types=1);

namespace App\Collector\Currency;

use App\Collector\Currency\Dto\CurrencyRateInterface;
use App\Collector\Currency\Filter\Attribute\CurrencyRateFilter;
use App\Collector\Currency\Filter\CurrencyRateAttributeFilter;
use App\Collector\Currency\Filter\Enum\FilterType;
use App\Collector\Exception\CollectDataException;
use App\Entity\Currency;
use App\Repository\CurrencyRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Psr\Log\LoggerInterface;
use Symfony\Component\DependencyInjection\Attribute\AutowireIterator;

class Collector
{
    /**
     * @param RateCollectorInterface[] $collectors
     */
    public function __construct(
        #[AutowireIterator('currency.rate_collector', defaultPriorityMethod: 'getPriority')]
        private readonly iterable $collectors,
        private readonly LoggerInterface $currencyRatesUpdateLogger,
        private readonly CurrencyRepository $currencyRepository,
        private readonly CurrencyRateAttributeFilter $filter,
    ) {
    }

    /**
     * @return Collection<int, Currency>
     */
    public function collect(?string $channel = null): Collection
    {
        $currencies = new ArrayCollection();

        foreach ($this->collectors as $collector) {
            if (null !== $channel && $channel !== $collector->getChannel()) {
                continue;
            }

            try {
                $result = $collector->collect();
            } catch (CollectDataException $exception) {
                $this->currencyRatesUpdateLogger->error(
                    'An error occurred while collecting currency rates!',
                    [
                        'channel' => $collector->getChannel(),
                        'message' => $exception->getMessage(),
                    ]
                );

                continue;
            }

            $result = $this->filter->filter($collector, $result);

            $currencyRates = $result->map(
                fn (CurrencyRateInterface $currencyRate) => $this->currencyRepository->findOrCreate(
                        $currencyRate->getIso3()
                    )
                    ->setRate($currencyRate->getRate()
                )
            );

            $currencies = new ArrayCollection(array_merge($currencies->toArray(), $currencyRates->toArray()));
        }

        return $currencies;
    }
}
