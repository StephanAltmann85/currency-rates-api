<?php

declare(strict_types=1);

namespace App\Collector\Currency;

use App\Collector\Currency\Dto\CurrencyRateInterface;
use App\Collector\Currency\Filter\AttributeFilter;
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
        private readonly AttributeFilter $filter,
    ) {
    }

    /**
     * @return Collection<string, Currency>
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
                fn (CurrencyRateInterface $currencyRate): Currency => $this->currencyRepository->findOrCreate($currencyRate->getIso3())
                    ->setRate($currencyRate->getRate()
                    )
            );

            $currencies = new ArrayCollection(array_merge($currencies->toArray(), $currencyRates->toArray()));
        }

        return $this->removeDuplicates($currencies);
    }

    /**
     * @param Collection<int, Currency> $currencies
     *
     * @return Collection<string, Currency>
     */
    private function removeDuplicates(Collection $currencies): Collection
    {
        $result = new ArrayCollection();

        foreach ($currencies as $currency) {
            $result->set($currency->getIso3(), $currency);
        }

        return $result;
    }
}
