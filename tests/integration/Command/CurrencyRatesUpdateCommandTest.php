<?php

declare(strict_types=1);

namespace App\Tests\integration\Command;

use App\Client\Client;
use App\Collector\Currency\Channel\Ecb\RateCollector;
use App\Collector\Currency\Channel\Ecb\Request\GetRatesRequest;
use App\Collector\Currency\Channel\Ecb\Response\Dto\CurrencyRate;
use App\Collector\Currency\Channel\Ecb\Response\GetRatesResponse;
use App\Collector\Currency\Collector;
use App\Collector\Currency\Filter\CurrencyRateAttributeFilter;
use App\Collector\Currency\Validation\Validator;
use App\Command\CurrencyRatesUpdateCommand;
use App\Entity\Currency;
use App\Entity\CurrencyRateHistory;
use App\EventListener\CurrencyUpdateEventListener;
use App\Persister\CurrencyCollectionPersister;
use App\Repository\CurrencyRateHistoryRepository;
use App\Repository\CurrencyRepository;
use App\Tests\Helper\Factory\CurrencyFactory;
use Doctrine\ORM\EntityManagerInterface;
use Doctrine\ORM\Tools\ToolsException;
use League\Flysystem\FilesystemException;
use League\Flysystem\FilesystemOperator;
use PHPUnit\Framework\Attributes\CoversClass;
use PHPUnit\Framework\Attributes\UsesClass;
use Symfony\Bundle\FrameworkBundle\Test\KernelTestCase;
use Symfony\Component\Console\Output\OutputInterface;
use Symfony\Component\Console\Tester\CommandTester;
use Symfony\Component\HttpClient\MockHttpClient;
use Symfony\Component\HttpClient\Response\MockResponse;
use Symfony\Contracts\HttpClient\HttpClientInterface;
use Zenstruck\Foundry\Test\Factories;
use Zenstruck\Foundry\Test\ResetDatabase;

#[CoversClass(CurrencyRatesUpdateCommand::class)]
#[CoversClass(CurrencyRateHistoryRepository::class)]
#[UsesClass(Collector::class)]
#[UsesClass(CurrencyRate::class)]
#[CoversClass(GetRatesResponse::class)]
#[UsesClass(CurrencyRepository::class)]
#[UsesClass(Currency::class)]
#[UsesClass(Validator::class)]
#[UsesClass(Client::class)]
#[UsesClass(GetRatesRequest::class)]
#[UsesClass(RateCollector::class)]
#[UsesClass(CurrencyUpdateEventListener::class)]
#[UsesClass(CurrencyRateAttributeFilter::class)]
#[UsesClass(CurrencyRateHistory::class)]
#[UsesClass(CurrencyCollectionPersister::class)]
class CurrencyRatesUpdateCommandTest extends KernelTestCase
{
    use ResetDatabase;
    use Factories;

    private CommandTester $commandTester;

    private MockHttpClient $httpClient;

    private FilesystemOperator $testDataStorage;

    private EntityManagerInterface $entityManager;

    public function setUp(): void
    {
        self::bootKernel();
        $container = static::getContainer();

        /** @var MockHttpClient $mockHttpClient */
        $mockHttpClient = $container->get(HttpClientInterface::class);
        /** @var FilesystemOperator $testDataStorage */
        $testDataStorage = $container->get('test.storage');
        /** @var CurrencyRatesUpdateCommand $command */
        $command = $container->get(CurrencyRatesUpdateCommand::class);
        /** @var EntityManagerInterface $entityManager */
        $entityManager = $container->get(EntityManagerInterface::class);

        $this->httpClient = $mockHttpClient;
        $this->testDataStorage = $testDataStorage;
        $this->entityManager = $entityManager;

        $this->commandTester = new CommandTester($command);

        parent::setUp();
    }

    /**
     * @throws FilesystemException
     * @throws ToolsException
     */
    public function testCommandExecution(): void
    {
        $currency = CurrencyFactory::new(['iso3' => 'TST', 'rate' => 1.0, 'updatedAt' => new \DateTime('2000-01-01')])
            ->create()
            ->_enableAutoRefresh()
            ->_real();

        $mockResponse = new MockResponse($this->testDataStorage->read('Responses/eurofxref-daily.xml'));

        $this->httpClient->setResponseFactory($mockResponse);

        $this->commandTester->execute([]);
        $output = $this->commandTester->getDisplay();

        $this->commandTester->assertCommandIsSuccessful();

        $this->assertCount(1, $currency->getHistory());
        $this->assertEquals(1.5, $currency->getRate());

        $this->assertCount(1, $this->entityManager->getRepository(CurrencyRateHistory::class)->findAll());
        $this->assertCount(31, $this->entityManager->getRepository(Currency::class)->findAll());

        $this->assertEmpty($output);
    }

    /**
     * @throws FilesystemException
     * @throws ToolsException
     */
    public function testCommandExecutionWithChannelOptionForExistingChannel(): void
    {
        $currency = CurrencyFactory::new(['iso3' => 'TST', 'rate' => 1.0, 'updatedAt' => new \DateTime('2000-01-01')])
            ->create()
            ->_enableAutoRefresh()
            ->_real();

        $mockResponse = new MockResponse($this->testDataStorage->read('Responses/eurofxref-daily.xml'));

        $this->httpClient->setResponseFactory($mockResponse);

        $this->commandTester->execute([
            '--channel' => 'ECB',
        ]);
        $this->commandTester->assertCommandIsSuccessful();

        $this->assertCount(1, $currency->getHistory());
        $this->assertEquals(1.5, $currency->getRate());

        $this->assertCount(1, $this->entityManager->getRepository(CurrencyRateHistory::class)->findAll());
        $this->assertCount(31, $this->entityManager->getRepository(Currency::class)->findAll());
    }

    /**
     * @throws FilesystemException
     * @throws ToolsException
     */
    public function testCommandExecutionWithChannelOptionForNotExistingChannel(): void
    {
        $currency = CurrencyFactory::new(['iso3' => 'TST', 'rate' => 1.0, 'updatedAt' => new \DateTime('2000-01-01')])
            ->create()
            ->_enableAutoRefresh()
            ->_real();

        $mockResponse = new MockResponse($this->testDataStorage->read('Responses/eurofxref-daily.xml'));

        $this->httpClient->setResponseFactory($mockResponse);

        $this->commandTester->execute([
            '--channel' => 'NOPE',
        ]);
        $this->commandTester->assertCommandIsSuccessful();

        $this->assertCount(0, $currency->getHistory());
        $this->assertEquals(1.0, $currency->getRate());

        $this->assertCount(0, $this->entityManager->getRepository(CurrencyRateHistory::class)->findAll());
        $this->assertCount(1, $this->entityManager->getRepository(Currency::class)->findAll());
    }

    /**
     * @throws FilesystemException
     * @throws ToolsException
     */
    public function testCommandExecutionIsNotAbortedIfInvalidResponseReceived(): void
    {
        $currency = CurrencyFactory::new(['iso3' => 'TST', 'rate' => 1.0, 'updatedAt' => new \DateTime('2000-01-01')])
            ->create()
            ->_enableAutoRefresh()
            ->_real();

        $mockResponse = new MockResponse($this->testDataStorage->read('Responses/eurofxref-daily_invalid.xml'));

        $this->httpClient->setResponseFactory($mockResponse);

        $this->commandTester->execute([]);
        $output = $this->commandTester->getDisplay();

        $this->commandTester->assertCommandIsSuccessful();

        $this->assertCount(0, $currency->getHistory());
        $this->assertEquals(1, $currency->getRate());

        $this->assertCount(0, $this->entityManager->getRepository(CurrencyRateHistory::class)->findAll());
        $this->assertCount(1, $this->entityManager->getRepository(Currency::class)->findAll());

        $this->assertEmpty($output);
    }

    /**
     * @throws FilesystemException
     * @throws ToolsException
     */
    public function testCommandExecutionIsNotAbortedIfErrorResponseReceived(): void
    {
        $currency = CurrencyFactory::new(['iso3' => 'TST', 'rate' => 1.0, 'updatedAt' => new \DateTime('2000-01-01')])
            ->create()
            ->_enableAutoRefresh()
            ->_real();

        $mockResponse = new MockResponse('Error', ['http_code' => 500]);

        $this->httpClient->setResponseFactory($mockResponse);

        $this->commandTester->execute([]);
        $this->commandTester->assertCommandIsSuccessful();

        $this->assertCount(0, $currency->getHistory());
        $this->assertEquals(1, $currency->getRate());

        $this->assertCount(0, $this->entityManager->getRepository(CurrencyRateHistory::class)->findAll());
        $this->assertCount(1, $this->entityManager->getRepository(Currency::class)->findAll());
    }

    public function testCommandOutputWithVerboseOption(): void
    {
        $mockResponse = new MockResponse($this->testDataStorage->read('Responses/eurofxref-daily.xml'));

        $this->httpClient->setResponseFactory($mockResponse);

        $this->commandTester->execute([], ['verbosity' => OutputInterface::VERBOSITY_VERBOSE]);

        $output = $this->commandTester->getDisplay();

        $this->commandTester->assertCommandIsSuccessful();
        $this->assertStringContainsString('Collecting data...', $output);
        $this->assertStringContainsString('Got 31', $output);
        $this->assertStringContainsString('Persisting data...', $output);
    }
}
