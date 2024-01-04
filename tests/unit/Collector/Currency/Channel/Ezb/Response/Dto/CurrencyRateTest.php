<?php

declare(strict_types=1);

namespace App\Tests\unit\Collector\Currency\Channel\Ezb\Response\Dto;

use App\Collector\Currency\Channel\Ezb\Response\Dto\CurrencyRate;
use App\Tests\unit\TestCases\SetterGetterTestCase;

/**
 * @coversDefaultClass \App\Collector\Currency\Channel\Ezb\Response\Dto\CurrencyRate
 **/
class CurrencyRateTest extends SetterGetterTestCase
{
    /**
     * @dataProvider setterGetterProvider
     *
     * @covers ::getRate
     * @covers ::getIso3
     * @covers ::setRate
     * @covers ::setIso3
     */
    public function testSetterGetter(string $setter, string $getter, mixed $value, bool $expectTypeError = false): void
    {
        $this->performSetterGetterCalls($setter, $getter, $value, $expectTypeError);
    }

    protected function getTarget(): object
    {
        return new CurrencyRate();
    }

    /**
     * @phpstan-return array<array<int, string|float|null>>
     */
    public static function setterGetterProvider(): array
    {
        return [
            ['setRate', 'getRate', 1.2],
            ['setRate', 'getRate', null],
            ['setIso3', 'getIso3', 'USD'],
            ['setIso3', 'getIso3', null],
        ];
    }
}
