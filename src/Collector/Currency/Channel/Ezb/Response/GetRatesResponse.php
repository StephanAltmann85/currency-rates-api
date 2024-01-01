<?php

declare(strict_types=1);

namespace App\Collector\Currency\Channel\Ezb\Response;

use App\Collector\Currency\Channel\Ezb\Response\Dto\CurrencyRate;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Symfony\Component\Serializer\Attribute\SerializedPath;
use Symfony\Component\Validator\Constraints as Assert;

class GetRatesResponse
{
    /** @phpstan-var Collection<int, CurrencyRate>  */
    #[Assert\Valid]
    #[SerializedPath('[Cube][Cube][Cube]')]
    private Collection $currencyRates;

    #[Assert\NotNull]
    #[SerializedPath('[Cube][Cube][@time]')]
    private ?\DateTime $time = null;

    public function __construct()
    {
        $this->currencyRates = new ArrayCollection();
    }

    /** @phpstan-return Collection<int,CurrencyRate> */
    public function getCurrencyRates(): Collection
    {
        return $this->currencyRates;
    }

    /** @phpstan-param CurrencyRate[] $currencyRates */
    public function setCurrencyRates(array $currencyRates): GetRatesResponse
    {
        $this->currencyRates = new ArrayCollection($currencyRates);

        return $this;
    }

    public function addCurrencyRate(CurrencyRate $currencyRate): GetRatesResponse
    {
        if (false === $this->currencyRates->contains($currencyRate)) {
            $this->currencyRates->add($currencyRate);
        }

        return $this;
    }

    public function getTime(): ?\DateTime
    {
        return $this->time;
    }

    public function setTime(\DateTime $time): GetRatesResponse
    {
        $this->time = $time;

        return $this;
    }
}
