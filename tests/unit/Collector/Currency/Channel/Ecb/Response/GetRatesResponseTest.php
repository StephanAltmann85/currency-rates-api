<?php

declare(strict_types=1);

namespace App\Tests\unit\Collector\Currency\Channel\Ecb\Response;

use App\Collector\Currency\Channel\Ecb\Response\Dto\CurrencyRate;
use App\Collector\Currency\Channel\Ecb\Response\GetRatesResponse;
use App\Tests\Helper\TestCases\SetterGetterTestCase;
use Doctrine\Common\Collections\ArrayCollection;
use PHPUnit\Framework\Attributes\CoversClass;
use PHPUnit\Framework\Attributes\DataProvider;

#[CoversClass(GetRatesResponse::class)]
class GetRatesResponseTest extends SetterGetterTestCase
{
    public function testInstantiation(): void
    {
        $response = new GetRatesResponse();

        $this->assertNull($response->getTime());
        $this->assertInstanceOf(ArrayCollection::class, $response->getCurrencyRates());
        $this->assertNull($response->getValidationGroups());
    }

    #[DataProvider('setterGetterProvider')]
    public function testSetterGetter(string $setter, string $getter, mixed $value, bool $expectTypeError = false): void
    {
        $this->performSetterGetterCalls($setter, $getter, $value, $expectTypeError);
    }

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
