<?php

declare(strict_types=1);

namespace App\Tests\Helper\Factory;

use App\Entity\CurrencyRateHistory;
use Zenstruck\Foundry\Persistence\PersistentProxyObjectFactory;

/**
 * @extends PersistentProxyObjectFactory<CurrencyRateHistory>
 */
final class CurrencyRateHistoryFactory extends PersistentProxyObjectFactory
{
    public static function class(): string
    {
        return CurrencyRateHistory::class;
    }

    protected function defaults(): array|callable
    {
        return [
            'currency' => CurrencyFactory::new(['iso3' => self::faker()->currencyCode()]),
            'date' => self::faker()->dateTime(),
            'rate' => self::faker()->randomFloat(),
        ];
    }

    protected function initialize(): static
    {
        return $this;
    }
}
