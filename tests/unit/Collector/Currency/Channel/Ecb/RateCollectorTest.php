<?php

declare(strict_types=1);

namespace App\Tests\unit\Collector\Currency\Channel\Ecb;

use App\Collector\Currency\Channel\Ecb\RateCollector;
use App\Collector\Currency\Channel\Ecb\Response\Dto\CurrencyRate;
use App\Collector\Currency\Channel\Ecb\Response\GetRatesResponse;
use App\Collector\Currency\RateCollectorInterface;
use App\Collector\Exception\CollectDataException;
use App\Collector\Exception\TransportException;
use App\Collector\Exception\ValidationException;
use App\Entity\Currency;
use Doctrine\Common\Collections\ArrayCollection;
use Mockery\Adapter\Phpunit\MockeryTestCase;
use Mockery\MockInterface;
use PHPUnit\Framework\Attributes\CoversClass;
use Symfony\Component\HttpClient\MockHttpClient;
use Symfony\Component\HttpClient\Response\MockResponse;
use Symfony\Component\Serializer\Encoder\XmlEncoder;
use Symfony\Component\Serializer\SerializerInterface;
use Symfony\Component\Validator\ConstraintViolationListInterface;
use Symfony\Component\Validator\Validator\ValidatorInterface;
use Symfony\Contracts\HttpClient\HttpClientInterface;

#[CoversClass(RateCollector::class)]
class RateCollectorTest extends MockeryTestCase
{
    private RateCollectorInterface $rateCollector;

    /** @phpstan-var MockHttpClient  */
    private HttpClientInterface $client;

    /** @phpstan-var SerializerInterface|MockInterface  */
    private SerializerInterface $serializer;

    /** @phpstan-var ValidatorInterface|MockInterface  */
    private ValidatorInterface $validator;

    public function setUp(): void
    {
        $this->client = new MockHttpClient();
        $this->serializer = \Mockery::mock(SerializerInterface::class);
        $this->validator = \Mockery::mock(ValidatorInterface::class);

        $this->rateCollector = new RateCollector($this->client, $this->serializer, $this->validator);

        parent::setUp();
    }

    public function testGetChannel(): void
    {
        $this->assertEquals('ECB', $this->rateCollector->getChannel());
    }

    public function testGetPriority(): void
    {
        $this->assertEquals(0, RateCollector::getPriority());
    }

    /**
     * @throws CollectDataException
     */
    public function testCollect(): void
    {
        $response = \Mockery::mock(GetRatesResponse::class);
        $constraintViolationList = \Mockery::mock(ConstraintViolationListInterface::class);
        $currencyRate1 = \Mockery::mock(CurrencyRate::class);
        $currencyRate2 = \Mockery::mock(CurrencyRate::class);
        $currency1 = \Mockery::mock(Currency::class);
        $currency2 = \Mockery::mock(Currency::class);

        $currencyRatesCollection = new ArrayCollection([$currencyRate1, $currencyRate2]);

        $this->client
            ->setResponseFactory(new MockResponse('{"response":"content"}'));

        $this->serializer
            ->shouldReceive('deserialize')
            ->once()
            ->with(
                '{"response":"content"}',
                GetRatesResponse::class,
                'xml',
                [XmlEncoder::ROOT_NODE_NAME => 'gesmes:Envelope']
            )
            ->andReturn($response);

        $this->validator
            ->shouldReceive('validate')
            ->once()
            ->andReturn($constraintViolationList);

        $constraintViolationList
            ->shouldReceive('count')
            ->once()
            ->andReturn(0);

        $response
            ->shouldReceive('getCurrencyRates')
            ->once()
            ->andReturn($currencyRatesCollection);

        $currencyRate1
            ->shouldReceive('getIso3')
            ->once()
            ->andReturn('USD');

        $currencyRate1
            ->shouldReceive('getRate')
            ->once()
            ->andReturn(1);

        $currencyRate2
            ->shouldReceive('getIso3')
            ->once()
            ->andReturn('TWD');

        $currencyRate2
            ->shouldReceive('getRate')
            ->once()
            ->andReturn(2);

        $currency1
            ->shouldReceive('setRate')
            ->once()
            ->with(1);

        $currency2
            ->shouldReceive('setRate')
            ->once()
            ->with(2);

        $result = $this->rateCollector->collect();

        $this->assertCount(2, $result);
        $this->assertEquals($currency1, $result->get(0));
        $this->assertEquals($currency2, $result->get(1));
    }

    /**
     * @throws CollectDataException
     */
    public function testCollectWithExceptionCausedByClient(): void
    {
        $this->client
            ->setResponseFactory(new MockResponse('{"response":"content"}', ['http_code' => 500]));

        $this->serializer
            ->shouldReceive('deserialize')
            ->never();

        $this->validator
            ->shouldReceive('validate')
            ->never();

        $this->expectException(TransportException::class);

        $this->rateCollector->collect();
    }

    /**
     * @throws CollectDataException
     */
    public function testCollectWithConstraintViolations(): void
    {
        $response = \Mockery::mock(GetRatesResponse::class);
        $constraintViolationList = \Mockery::mock(ConstraintViolationListInterface::class);

        $this->client
            ->setResponseFactory(new MockResponse('{"response":"content"}', ['http_code' => 500]));

        $this->client
            ->setResponseFactory(new MockResponse('{"response":"content"}'));

        $this->serializer
            ->shouldReceive('deserialize')
            ->once()
            ->with(
                '{"response":"content"}',
                GetRatesResponse::class,
                'xml',
                [XmlEncoder::ROOT_NODE_NAME => 'gesmes:Envelope']
            )
            ->andReturn($response);

        $this->validator
            ->shouldReceive('validate')
            ->once()
            ->andReturn($constraintViolationList);

        $constraintViolationList
            ->shouldReceive('count')
            ->once()
            ->andReturn(1);

        $this->expectException(ValidationException::class);

        $this->rateCollector->collect();
    }
}
