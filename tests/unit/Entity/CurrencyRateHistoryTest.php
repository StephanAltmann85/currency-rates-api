<?php

declare(strict_types=1);

namespace App\Tests\unit\Entity;

use App\Entity\Currency;
use App\Entity\CurrencyRateHistory;
use App\Tests\unit\TestCases\SetterGetterTestCase;

/**
 * @coversDefaultClass \App\Entity\CurrencyRateHistory
 **/
class CurrencyRateHistoryTest extends SetterGetterTestCase
{
    /**
     * @dataProvider setterGetterProvider
     *
     * @covers ::getRate
     * @covers ::setRate
     * @covers ::getCurrency
     * @covers ::setCurrency
     * @covers ::getDate
     * @covers ::setDate
     */
    public function testSetterGetter(string $setter, string $getter, mixed $value, bool $expectTypeError = false): void
    {
        $this->performSetterGetterCalls($setter, $getter, $value, $expectTypeError);
    }

    /**
     * @covers ::getId
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
