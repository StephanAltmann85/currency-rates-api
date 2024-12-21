<?php

declare(strict_types=1);

namespace App\Tests\unit\Entity;

use App\Entity\Currency;
use App\Entity\CurrencyRateHistory;
use App\Tests\Helper\TestCases\SetterGetterTestCase;
use PHPUnit\Framework\Attributes\CoversClass;
use PHPUnit\Framework\Attributes\DataProvider;

#[CoversClass(CurrencyRateHistory::class)]
class CurrencyRateHistoryTest extends SetterGetterTestCase
{
    #[DataProvider('setterGetterProvider')]
    public function testSetterGetter(string $setter, string $getter, mixed $value, bool $expectTypeError = false): void
    {
        $this->performSetterGetterCalls($setter, $getter, $value, $expectTypeError);
    }

    /**
     * @throws \ReflectionException
     */
    public function testGetId(): void
    {
        $currencyRateHistory = new CurrencyRateHistory();
        $this->setByReflection($currencyRateHistory, 'id', '06596b45-b9cd-7514-8000-dbce2c5d54f0');

        $this->assertEquals('06596b45-b9cd-7514-8000-dbce2c5d54f0', $currencyRateHistory->getId());
    }

    protected function getTarget(): object
    {
        return new CurrencyRateHistory();
    }

    /**
     * @phpstan-return array<array<int, string|float|null|\DateTime|Currency|bool>>
     */
    public static function setterGetterProvider(): array
    {
        return [
            ['setRate', 'getRate', 1.2],
            ['setRate', 'getRate', null, true],
            ['setDate', 'getDate', new \DateTime()],
            ['setDate', 'getDate', null, true],
            ['setCurrency', 'getCurrency', new Currency('TST')],
            ['setCurrency', 'getCurrency', null],
        ];
    }
}
