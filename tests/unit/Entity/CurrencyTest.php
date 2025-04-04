<?php

declare(strict_types=1);

namespace App\Tests\unit\Entity;

use App\Entity\Currency;
use App\Entity\CurrencyRateHistory;
use App\Tests\Helper\TestCases\SetterGetterTestCase;
use Doctrine\Common\Collections\ArrayCollection;
use PHPUnit\Framework\Attributes\CoversClass;
use PHPUnit\Framework\Attributes\DataProvider;

#[CoversClass(Currency::class)]
class CurrencyTest extends SetterGetterTestCase
{
    #[DataProvider('setterGetterProvider')]
    public function testSetterGetter(string $setter, string $getter, mixed $value, bool $expectTypeError = false): void
    {
        $this->performSetterGetterCalls($setter, $getter, $value, $expectTypeError);
    }

    public function testInstantiation(): void
    {
        $currency = new Currency('USD');

        $this->assertEquals('USD', $currency->getIso3());
        $this->assertInstanceOf(ArrayCollection::class, $currency->getHistory());
    }

    public function testAssociations(): void
    {
        $currencyRateHistory1 = \Mockery::mock(CurrencyRateHistory::class);
        $currencyRateHistory2 = \Mockery::mock(CurrencyRateHistory::class);

        $currency = new Currency('TST');

        $this->assertCount(0, $currency->getHistory());

        $currencyRateHistory1
            ->shouldReceive('setCurrency')
            ->once()
            ->with($currency);

        $currencyRateHistory2
            ->shouldReceive('setCurrency')
            ->once()
            ->with($currency);

        $currency->addHistory($currencyRateHistory1);
        $currency->addHistory($currencyRateHistory1);
        $currency->addHistory($currencyRateHistory2);

        $this->assertCount(2, $currency->getHistory());
        $this->assertEquals($currencyRateHistory1, $currency->getHistory()->get(0));
        $this->assertEquals($currencyRateHistory2, $currency->getHistory()->get(1));
    }

    protected function getTarget(): object
    {
        return new Currency('TST');
    }

    /**
     * @phpstan-return array<array<int, string|float|null|\DateTime|bool>>
     */
    public static function setterGetterProvider(): array
    {
        return [
            ['setRate', 'getRate', 1.2],
            ['setRate', 'getRate', null, true],
            ['setUpdatedAt', 'getUpdatedAt', new \DateTime()],
            ['setUpdatedAt', 'getUpdatedAt', null, true],
        ];
    }
}
