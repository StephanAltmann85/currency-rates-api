<?php

declare(strict_types=1);

namespace App\Tests\unit\Collector\Currency\Channel\Ecb\Response\Dto;

use App\Collector\Currency\Channel\Ecb\Response\Dto\CurrencyRate;
use App\Tests\unit\TestCases\SetterGetterTestCase;
use PHPUnit\Framework\Attributes\CoversClass;
use PHPUnit\Framework\Attributes\DataProvider;

#[CoversClass(CurrencyRate::class)]
class CurrencyRateTest extends SetterGetterTestCase
{
    #[DataProvider('setterGetterProvider')]
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
