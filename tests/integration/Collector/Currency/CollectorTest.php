<?php

declare(strict_types=1);

namespace App\Tests\integration\Collector\Currency;

use App\Client\Client;
use App\Collector\Currency\Channel\Ecb\RateCollector;
use App\Collector\Currency\Channel\Ecb\Request\GetRatesRequest;
use App\Collector\Currency\Channel\Ecb\Response\Dto\CurrencyRate;
use App\Collector\Currency\Channel\Ecb\Response\GetRatesResponse;
use App\Collector\Currency\Collector;
use App\Collector\Currency\Filter\CurrencyRateAttributeFilter;
use App\Collector\Currency\Validation\Validator;
use App\Entity\Currency;
use App\EventListener\CurrencyUpdateEventListener;
use App\Repository\CurrencyRepository;
use App\Tests\Helper\Trait\DatabaseTrait;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\EntityManagerInterface;
use Doctrine\ORM\Tools\SchemaTool;
use Doctrine\ORM\Tools\ToolsException;
use League\Flysystem\FilesystemException;
use League\Flysystem\FilesystemOperator;
use PHPUnit\Framework\Attributes\CoversClass;
use PHPUnit\Framework\Attributes\UsesClass;
use PHPUnit\Framework\MockObject\Exception;
use PHPUnit\Framework\MockObject\MockObject;
use Psr\Log\LoggerInterface;
use Symfony\Bundle\FrameworkBundle\Test\KernelTestCase;
use Symfony\Component\HttpClient\MockHttpClient;
use Symfony\Component\HttpClient\Response\MockResponse;
use Symfony\Contracts\HttpClient\HttpClientInterface;

#[CoversClass(Collector::class)]
#[CoversClass(CurrencyRepository::class)]
#[CoversClass(RateCollector::class)]
#[CoversClass(CurrencyRate::class)]
#[UsesClass(GetRatesResponse::class)]
#[UsesClass(Currency::class)]
#[UsesClass(Validator::class)]
#[UsesClass(Client::class)]
#[UsesClass(GetRatesRequest::class)]
#[UsesClass(CurrencyRateAttributeFilter::class)]
#[UsesClass(CurrencyUpdateEventListener::class)]
class CollectorTest extends KernelTestCase
{
    use DatabaseTrait;

    private MockHttpClient $httpClient;

    private Collector $collector;

    /** @phpstan-var LoggerInterface|MockObject */
    private LoggerInterface $logger;

    private FilesystemOperator $testDataStorage;

    /**
     * @throws Exception
     */
    public function setUp(): void
    {
        self::bootKernel();
        $container = static::getContainer();

        $this->logger = $this->createMock(LoggerInterface::class);
        $container->set('monolog.logger.currency_rates_update', $this->logger);

        /** @var MockHttpClient $mockHttpClient */
        $mockHttpClient = $container->get(HttpClientInterface::class);
        /** @var Collector $collector */
        $collector = $container->get(Collector::class);
        /** @var EntityManagerInterface $entityManager */
        $entityManager = $container->get(EntityManagerInterface::class);
        /** @var FilesystemOperator $testDataStorage */
        $testDataStorage = $container->get('test.storage');
        /** @var SchemaTool $schemaTool */
        $schemaTool = $container->get(SchemaTool::class);

        $this->httpClient = $mockHttpClient;
        $this->collector = $collector;
        $this->entityManager = $entityManager;
        $this->testDataStorage = $testDataStorage;
        $this->schemaTool = $schemaTool;

        parent::setUp();
    }

    /**
     * @throws FilesystemException
     * @throws ToolsException
     */
    public function testCollect(): void
    {
        $this->createTestCurrency();

        $mockResponse = new MockResponse($this->testDataStorage->read('Responses/eurofxref-daily.xml'));

        $this->httpClient->setResponseFactory($mockResponse);

        $result = $this->collector->collect();

        $this->assertInstanceOf(Collection::class, $result);
        $this->assertContainsOnlyInstancesOf(Currency::class, $result);
        $this->assertCount(31, $result);

        /** @phpstan-var Currency $testCurrency */
        $testCurrency = $result->last();
        $this->assertEquals('2000-01-01', $testCurrency->getUpdatedAt()->format('Y-m-d'));
    }

    /**
     * @throws FilesystemException
     */
    public function testCollectWithInvalidData(): void
    {
        $mockResponse = new MockResponse($this->testDataStorage->read('Responses/eurofxref-daily_invalid.xml'));

        $this->httpClient->setResponseFactory($mockResponse);

        $this->logger
            ->expects($this->once())
            ->method('error')
            ->with('An error occurred while collecting currency rates!');

        $result = $this->collector->collect();

        $this->assertInstanceOf(Collection::class, $result);
        $this->assertContainsOnlyInstancesOf(Currency::class, $result);
        $this->assertCount(0, $result);
    }

    public function testCollectWithErrorResponse(): void
    {
        $mockResponse = new MockResponse('', ['http_code' => 500]);

        $this->httpClient->setResponseFactory($mockResponse);

        $this->logger
            ->expects($this->once())
            ->method('error')
            ->with('An error occurred while collecting currency rates!');

        $result = $this->collector->collect();

        $this->assertInstanceOf(Collection::class, $result);
        $this->assertContainsOnlyInstancesOf(Currency::class, $result);
        $this->assertCount(0, $result);
    }

    public function testCollectWithUnknownChannel(): void
    {
        $result = $this->collector->collect('UNKNOWN');

        $this->assertInstanceOf(Collection::class, $result);
        $this->assertCount(0, $result);
    }

    /**
     * @throws ToolsException
     */
    private function createTestCurrency(): void
    {
        $this->resetDatabase();

        $currency = (new Currency('TST'))
            ->setRate(1)
            ->setUpdatedAt(new \DateTime('2000-01-01'));

        $this->entityManager->persist($currency);
        $this->entityManager->flush();
    }
}
