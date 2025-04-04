<?php

declare(strict_types=1);

namespace App\Collector\Currency\Filter;

use App\Collector\Currency\Filter\Attribute\CurrencyRateFilter;
use App\Collector\Currency\Filter\Enum\FilterType;
use App\Collector\Currency\Response\CurrencyRateInterface;
use Doctrine\Common\Collections\Collection;

readonly class CurrencyRateAttributeFilter implements AttributeFilter
{
    /**
     * @param Collection<int, CurrencyRateInterface> $data
     *
     * @return Collection<int, CurrencyRateInterface>
     *
     * @template-extends AttributeFilter<int, CurrencyRateInterface>
     */
    public function filter(object $attributedClass, Collection $data): Collection
    {
        $reflection = new \ReflectionClass($attributedClass);
        $filterAttributes = $reflection->getAttributes(CurrencyRateFilter::class);

        if (true === empty($filterAttributes)) {
            return $data;
        }

        $filterAttribute = reset($filterAttributes);

        /** @var FilterType $type */
        $type = $filterAttribute->getArguments()[0];
        /** @var string[] $values */
        $values = $filterAttribute->getArguments()[1];

        if (FilterType::BLACKLIST === $type) {
            return $this->filterBlacklist($data, $values);
        }

        return $this->filterWhitelist($data, $values);
    }

    /**
     * @param Collection<int, CurrencyRateInterface> $currencyRates
     * @param string[]                               $values
     *
     * @return Collection<int, CurrencyRateInterface>
     */
    private function filterBlacklist(Collection $currencyRates, array $values): Collection
    {
        return $currencyRates->filter(
            fn (CurrencyRateInterface $currencyRate) => false === \in_array($currencyRate->getIso3(), $values, true)
        );
    }

    /**
     * @param Collection<int, CurrencyRateInterface> $currencyRates
     * @param string[]                               $values
     *
     * @return Collection<int, CurrencyRateInterface>
     */
    private function filterWhitelist(Collection $currencyRates, array $values): Collection
    {
        return $currencyRates->filter(
            fn (CurrencyRateInterface $currencyRate) => true === \in_array($currencyRate->getIso3(), $values, true)
        );
    }
}
