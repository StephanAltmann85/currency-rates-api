<?php

namespace App\Collector\Currency\Channel\Ezb\Response\Dto;

use Symfony\Component\Serializer\Attribute\SerializedName;
use Symfony\Component\Validator\Constraints as Assert;

class CurrencyRate
{
    #[Assert\NotNull]
    #[Assert\Length(exactly: 3)]
    #[SerializedName('@currency')]
    private ?string $iso3 = null;

    #[Assert\NotNull]
    #[Assert\Positive]
    #[SerializedName('@rate')]
    private ?float $rate = null;

    public function getIso3(): ?string
    {
        return $this->iso3;
    }

    public function setIso3(?string $iso3): CurrencyRate
    {
        $this->iso3 = $iso3;

        return $this;
    }

    public function getRate(): ?float
    {
        return $this->rate;
    }

    public function setRate(?float $rate): CurrencyRate
    {
        $this->rate = $rate;

        return $this;
    }
}
