<?php

declare(strict_types=1);

namespace App\Tests\unit\Collector\Currency\Channel\Ecb;

use App\Client\ClientInterface;
use App\Collector\Currency\Channel\Ecb\RateCollector;
use App\Collector\Currency\Channel\Ecb\Request\GetRatesRequest;
use App\Collector\Currency\Channel\Ecb\Response\Dto\CurrencyRate;
use App\Collector\Currency\Channel\Ecb\Response\GetRatesResponse;
use App\Collector\Currency\RateCollectorInterface;
use App\Collector\Currency\Validation\ValidatorInterface;
use App\Collector\Exception\CollectDataException;
use App\Collector\Exception\TransportException;
use App\Collector\Exception\ValidationException;
use Doctrine\Common\Collections\ArrayCollection;
use Mockery\Adapter\Phpunit\MockeryTestCase;
use Mockery\MockInterface;
use PHPUnit\Framework\Attributes\CoversClass;
use PHPUnit\Framework\Attributes\UsesClass;
use Symfony\Component\HttpClient\Exception\TransportException as HttpTransportException;
use Symfony\Component\Serializer\Encoder\XmlEncoder;
use Symfony\Component\Serializer\SerializerInterface;
use Symfony\Component\Validator\ConstraintViolationListInterface;
use Symfony\Contracts\HttpClient\ResponseInterface;

#[CoversClass(RateCollector::class)]
#[UsesClass(GetRatesRequest::class)]
class RateCollectorTest extends MockeryTestCase
{
    private RateCollectorInterface $rateCollector;

    /** @phpstan-var ClientInterface|MockInterface  */
    private ClientInterface $client;

    /** @phpstan-var SerializerInterface|MockInterface  */
    private SerializerInterface $serializer;

    /** @phpstan-var ValidatorInterface|MockInterface  */
    private ValidatorInterface $validator;

    public function setUp(): void
    {
        $this->client = \Mockery::mock(ClientInterface::class);
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
        $httpResponse = \Mockery::mock(ResponseInterface::class);
        $response = \Mockery::mock(GetRatesResponse::class);
        $constraintViolationList = \Mockery::mock(ConstraintViolationListInterface::class);
        $currencyRate1 = \Mockery::mock(CurrencyRate::class);
        $currencyRate2 = \Mockery::mock(CurrencyRate::class);

        $currencyRatesCollection = new ArrayCollection([$currencyRate1, $currencyRate2]);

        $this->client
            ->shouldReceive('request')
            ->once()
            ->with(\Mockery::type(GetRatesRequest::class))
            ->andReturn($httpResponse);

        $httpResponse
            ->shouldReceive('getContent')
            ->once()
            ->andReturn('{"response":"content"}');

        $response
            ->shouldReceive('getValidationGroups')
            ->once()
            ->andReturn(null);

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

        $response
            ->shouldReceive('getCurrencyRates')
            ->once()
            ->andReturn($currencyRatesCollection);

        $result = $this->rateCollector->collect();

        $this->assertCount(2, $result);
        $this->assertEquals($currencyRate1, $result->get(0));
        $this->assertEquals($currencyRate2, $result->get(1));
    }

    /**
     * @throws CollectDataException
     */
    public function testCollectWithExceptionCausedByClient(): void
    {
        $exception = new HttpTransportException('Error', 500);

        $this->client
            ->shouldReceive('request')
            ->once()
            ->with(\Mockery::type(GetRatesRequest::class))
            ->andThrows($exception);

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
        $httpResponse = \Mockery::mock(ResponseInterface::class);
        $response = \Mockery::mock(GetRatesResponse::class);
        $constraintViolationList = \Mockery::mock(ConstraintViolationListInterface::class);
        $exception = new ValidationException('Error', $constraintViolationList);

        $this->client
            ->shouldReceive('request')
            ->once()
            ->with(\Mockery::type(GetRatesRequest::class))
            ->andReturn($httpResponse);

        $httpResponse
            ->shouldReceive('getContent')
            ->once()
            ->andReturn('{"response":"content"}');

        $response
            ->shouldReceive('getValidationGroups')
            ->once()
            ->andReturn(null);

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
            ->andThrows($exception);

        $this->expectException(ValidationException::class);

        $this->rateCollector->collect();
    }
}
