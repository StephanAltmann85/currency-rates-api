<?php

declare(strict_types=1);

namespace App\Collector\Currency\Response;

interface CurrencyRateInterface
{
    public function getIso3(): string;

    public function setIso3(string $iso3): CurrencyRateInterface;

    public function getRate(): float;

    public function setRate(float|int $rate): CurrencyRateInterface;
}
