<?php

declare(strict_types=1);

namespace App\Tests\Helper\Factory;

use App\Entity\Currency;
use Zenstruck\Foundry\Persistence\PersistentProxyObjectFactory;

/**
 * @extends PersistentProxyObjectFactory<Currency>
 */
final class CurrencyFactory extends PersistentProxyObjectFactory
{
    public static function class(): string
    {
        return Currency::class;
    }

    protected function defaults(): array|callable
    {
        return [
            'rate' => self::faker()->randomFloat(),
            'updatedAt' => self::faker()->dateTime(),
        ];
    }

    protected function initialize(): static
    {
        return $this;
    }
}
