<?php

declare(strict_types=1);

namespace App\Collector\Currency\Response;

use App\Client\Response\ResponseInterface;
use Doctrine\Common\Collections\Collection;

interface CurrencyRateResponseInterface extends ResponseInterface
{
    /** @phpstan-return Collection<int,CurrencyRateInterface> */
    public function getCurrencyRates(): Collection;
}
