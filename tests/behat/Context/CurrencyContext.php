<?php

declare(strict_types=1);

namespace App\Tests\behat\Context;

use App\Entity\Currency;
use App\Entity\CurrencyRateHistory;
use App\Repository\CurrencyRepository;
use Behat\Behat\Context\Context;
use Doctrine\ORM\EntityManagerInterface;
use Webmozart\Assert\Assert;

class CurrencyContext implements Context
{
    public function __construct(
        private readonly CurrencyRepository $currencyRepository,
        private readonly EntityManagerInterface $entityManager,
    ) {
    }

    /**
     * @Then a currency with iso3 :iso3 and rate :rate can be found in the database
     */
    public function theCurrencyEntityDoesExist(string $iso3, float $rate): void
    {
        $this->entityManager->clear();
        $currency = $this->currencyRepository->find($iso3);

        Assert::notNull($currency);
        Assert::eq($currency->getRate(), $rate);
    }

    /**
     * @Then the rate history for currency with iso3 :iso3 is empty
     */
    public function theRateHistoryIsEmpty(string $iso3): void
    {
        $this->entityManager->clear();
        /** @phpstan-var Currency $currency */
        $currency = $this->currencyRepository->find($iso3);

        Assert::true($currency->getHistory()->isEmpty());
    }

    /**
     * @Then a rate history entry for currency :iso3 with rate :rate from :dateString exists
     */
    public function theRateHistoryHasEntry(string $iso3, float $rate, string $dateString): void
    {
        $this->entityManager->clear();
        /** @phpstan-var Currency $currency */
        $currency = $this->currencyRepository->find($iso3);

        $currencyRateHistory = $currency->getHistory()->filter(
            fn (CurrencyRateHistory $currencyRateHistory): bool => $currencyRateHistory->getRate() === $rate
                /* @phpstan-ignore-next-line */
                && $currencyRateHistory->getDate()->format('Y-m-d H:i:s') === $dateString
        );

        Assert::false($currencyRateHistory->isEmpty());
    }
}
