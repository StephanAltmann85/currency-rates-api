<?php

declare(strict_types=1);

namespace App\Tests\integration\Collector\Currency;

use App\Collector\Currency\Collector;
use App\Entity\Currency;
use Doctrine\Common\Collections\Collection;
use PHPUnit\Framework\MockObject\MockObject;
use Psr\Log\LoggerInterface;
use Symfony\Bundle\FrameworkBundle\Test\KernelTestCase;
use Symfony\Component\HttpClient\MockHttpClient;
use Symfony\Component\HttpClient\Response\MockResponse;
use Symfony\Contracts\HttpClient\HttpClientInterface;

class CollectorTest extends KernelTestCase
{
    private MockHttpClient $httpClient;

    private Collector $collector;

    /** @phpstan-var LoggerInterface|MockObject)  */
    private LoggerInterface $logger;

    public function setUp(): void
    {
        self::bootKernel();
        $container = static::getContainer();

        $this->httpClient = new MockHttpClient();
        $this->logger = $this->createMock(LoggerInterface::class);

        $container->set(HttpClientInterface::class, $this->httpClient);
        $container->set('monolog.logger.currency_rates_update', $this->logger);

        /** @var Collector $collector */
        $collector = $container->get(Collector::class);
        $this->collector = $collector;

        parent::setUp();
    }

    public function testCollect(): void
    {
        // TODO: add ci
        // TODO: add fixtures to test loading of existing entities
        $mockResponse = new MockResponse((string) file_get_contents(__DIR__.'/../../Data/eurofxref-daily.xml'));

        $this->httpClient->setResponseFactory($mockResponse);

        $result = $this->collector->collect();

        $this->assertInstanceOf(Collection::class, $result);
        $this->assertContainsOnlyInstancesOf(Currency::class, $result);
        $this->assertCount(30, $result);
    }

    public function testCollectWithInvalidData(): void
    {
        $mockResponse = new MockResponse((string) file_get_contents(__DIR__.'/../../Data/eurofxref-daily_invalid.xml'));

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
}
