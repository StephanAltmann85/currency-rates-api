<?php

declare(strict_types=1);

namespace App\Tests\integration\Collector\Currency\Channel\Ecb;

use App\Client\Client;
use App\Collector\Currency\Channel\Ecb\RateCollector;
use App\Collector\Currency\Channel\Ecb\Request\GetRatesRequest;
use App\Collector\Currency\Channel\Ecb\Response\Dto\CurrencyRate;
use App\Collector\Currency\Channel\Ecb\Response\GetRatesResponse;
use App\Collector\Currency\Collector;
use App\Collector\Currency\Filter\CurrencyRateAttributeFilter;
use App\Collector\Currency\Response\CurrencyRateInterface;
use App\Collector\Currency\Validation\Validator;
use App\Collector\Exception\CollectDataException;
use App\Entity\Currency;
use App\EventListener\CurrencyUpdateEventListener;
use App\Repository\CurrencyRepository;
use Doctrine\Common\Collections\Collection;
use League\Flysystem\FilesystemException;
use League\Flysystem\FilesystemOperator;
use PHPUnit\Framework\Attributes\CoversClass;
use PHPUnit\Framework\Attributes\UsesClass;
use Symfony\Bundle\FrameworkBundle\Test\KernelTestCase;
use Symfony\Component\HttpClient\MockHttpClient;
use Symfony\Component\HttpClient\Response\MockResponse;
use Symfony\Contracts\HttpClient\HttpClientInterface;

#[CoversClass(Collector::class)]
#[CoversClass(RateCollector::class)]
#[CoversClass(CurrencyRate::class)]
#[CoversClass(GetRatesResponse::class)]
#[CoversClass(CurrencyRepository::class)]
#[CoversClass(Currency::class)]
#[CoversClass(Validator::class)]
#[CoversClass(Client::class)]
#[CoversClass(GetRatesRequest::class)]
#[UsesClass(CurrencyRateAttributeFilter::class)]
#[UsesClass(CurrencyUpdateEventListener::class)]
class RateCollectorTest extends KernelTestCase
{
    private MockHttpClient $httpClient;

    private RateCollector $rateCollector;

    private FilesystemOperator $testDataStorage;

    public function setUp(): void
    {
        self::bootKernel();
        $container = static::getContainer();

        /** @var MockHttpClient $mockHttpClient */
        $mockHttpClient = $container->get(HttpClientInterface::class);
        /** @var RateCollector $rateCollector */
        $rateCollector = $container->get(RateCollector::class);
        /** @var FilesystemOperator $testDataStorage */
        $testDataStorage = $container->get('test.storage');

        $this->assertEquals(0, $rateCollector::getPriority());

        $this->httpClient = $mockHttpClient;
        $this->rateCollector = $rateCollector;
        $this->testDataStorage = $testDataStorage;

        parent::setUp();
    }

    /**
     * @throws CollectDataException
     * @throws FilesystemException
     */
    public function testCollect(): void
    {
        $mockResponse = new MockResponse($this->testDataStorage->read('Responses/eurofxref-daily.xml'));

        $this->httpClient->setResponseFactory($mockResponse);

        $result = $this->rateCollector->collect();

        $this->assertInstanceOf(Collection::class, $result);
        $this->assertContainsOnlyInstancesOf(CurrencyRateInterface::class, $result);
        $this->assertCount(31, $result);
    }

    /**
     * @throws CollectDataException
     * @throws FilesystemException
     */
    public function testCollectWithInvalidResponse(): void
    {
        $mockResponse = new MockResponse($this->testDataStorage->read('Responses/eurofxref-daily_invalid.xml'));

        $this->httpClient->setResponseFactory($mockResponse);

        $this->expectException(CollectDataException::class);

        $this->rateCollector->collect();
    }

    public function testCollectWithNotEncodableContent(): void
    {
        $mockResponse = new MockResponse('Error');

        $this->httpClient->setResponseFactory($mockResponse);

        $this->expectException(CollectDataException::class);
        $this->expectExceptionMessage('Start tag expected, \'<\' not found');

        $this->rateCollector->collect();
    }

    public function testCollectErrorResponse(): void
    {
        $mockResponse = new MockResponse('<xml></xml>', ['http_code' => 500]);

        $this->httpClient->setResponseFactory($mockResponse);

        $this->expectException(CollectDataException::class);
        $this->expectExceptionMessage('HTTP 500 returned for "https://www.ecb.europa.eu/stats/eurofxref/eurofxref-daily.xml".');

        $this->rateCollector->collect();
    }
}
