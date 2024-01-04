<?php

declare(strict_types=1);

namespace App\Tests\unit\Collector\Currency\Channel\Ezb\Response;

use App\Collector\Currency\Channel\Ezb\Response\Dto\CurrencyRate;
use App\Collector\Currency\Channel\Ezb\Response\GetRatesResponse;
use App\Tests\unit\TestCases\SetterGetterTestCase;
use Doctrine\Common\Collections\ArrayCollection;

/**
 * @coversDefaultClass \App\Collector\Currency\Channel\Ezb\Response\GetRatesResponse
 **/
class GetRatesResponseTest extends SetterGetterTestCase
{
    /**
     * @covers ::__construct
     * @covers ::getCurrencyRates
     * @covers ::getTime
     */
    public function testInstantiation(): void
    {
        $response = new GetRatesResponse();

        $this->assertNull($response->getTime());
        $this->assertInstanceOf(ArrayCollection::class, $response->getCurrencyRates());
    }

    /**
     * @dataProvider setterGetterProvider
     *
     * @covers ::getTime
     * @covers ::setTime
     */
    public function testSetterGetter(string $setter, string $getter, mixed $value, bool $expectTypeError = false): void
    {
        $this->performSetterGetterCalls($setter, $getter, $value, $expectTypeError);
    }

    /**
     * @covers ::addCurrencyRate
     * @covers ::getCurrencyRates
     * @covers ::setCurrencyRates
     */
    public function testAssociations(): void
    {
        $currencyRate1 = \Mockery::mock(CurrencyRate::class);
        $currencyRate2 = \Mockery::mock(CurrencyRate::class);
        $currencyRate3 = \Mockery::mock(CurrencyRate::class);

        $response = new GetRatesResponse();

        $this->assertCount(0, $response->getCurrencyRates());

        $response->addCurrencyRate($currencyRate1);
        $response->addCurrencyRate($currencyRate1);

        $this->assertCount(1, $response->getCurrencyRates());
        $this->assertEquals($currencyRate1, $response->getCurrencyRates()->get(0));

        $response->setCurrencyRates([$currencyRate2, $currencyRate3]);

        $this->assertCount(2, $response->getCurrencyRates());
        $this->assertEquals($currencyRate2, $response->getCurrencyRates()->get(0));
        $this->assertEquals($currencyRate3, $response->getCurrencyRates()->get(1));
    }

    protected function getTarget(): object
    {
        return new GetRatesResponse();
    }

    /**
     * @phpstan-return array<array<int, string|\DateTime|null|bool>>
     */
    public static function setterGetterProvider(): array
    {
        return [
            ['setTime', 'getTime', new \DateTime()],
            ['setTime', 'getTime', null, true],
        ];
    }
}
