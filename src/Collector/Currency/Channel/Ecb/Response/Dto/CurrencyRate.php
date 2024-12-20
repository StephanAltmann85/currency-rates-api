<?php

declare(strict_types=1);

namespace App\Collector\Currency\Channel\Ecb\Response\Dto;

use App\Collector\Currency\Dto\CurrencyRateInterface;
use Symfony\Component\Serializer\Attribute\SerializedName;
use Symfony\Component\Validator\Constraints as Assert;

class CurrencyRate implements CurrencyRateInterface
{
    #[Assert\NotNull]
    #[Assert\Length(exactly: 3)]
    #[SerializedName('@currency')]
    private string $iso3;

    #[Assert\NotNull]
    #[Assert\Positive]
    #[SerializedName('@rate')]
    private float $rate;

    public function getIso3(): string
    {
        return $this->iso3;
    }

    public function setIso3(string $iso3): CurrencyRateInterface
    {
        $this->iso3 = $iso3;

        return $this;
    }

    public function getRate(): float
    {
        return $this->rate;
    }

    public function setRate(float|int $rate): CurrencyRateInterface
    {
        $this->rate = (float) $rate;

        return $this;
    }
}
