<?php

declare(strict_types=1);

namespace App\Tests\behat\Context;

use App\Entity\Currency;
use App\Entity\CurrencyRateHistory;
use Behat\Behat\Context\Context;
use Doctrine\ORM\EntityManagerInterface;
use Doctrine\ORM\Mapping\ClassMetadata;
use Doctrine\ORM\Tools\SchemaTool;
use Doctrine\ORM\Tools\ToolsException;
use Fidry\AliceDataFixtures\LoaderInterface;
use Symfony\Component\DependencyInjection\Attribute\Autowire;

class DatabaseContext implements Context
{
    public const FIXTURES_BASE_PATH = __DIR__.'/../../TestData/Fixtures/';

    /** @phpstan-var ClassMetadata<Currency|CurrencyRateHistory>[]  */
    private array $classes;

    public function __construct(
        private readonly EntityManagerInterface $entityManager,
        private readonly SchemaTool $schemaTool,
        #[Autowire(service: 'fidry_alice_data_fixtures.doctrine.purger_loader')]
        private readonly LoaderInterface $loader,
    ) {
        $this->classes = $this->entityManager->getMetadataFactory()->getAllMetadata();
    }

    /**
     * @BeforeScenario @createSchema
     *
     * @throws ToolsException
     */
    public function createSchema(): void
    {
        $this->schemaTool->createSchema($this->classes);
    }

    /**
     * @BeforeScenario @dropSchema
     */
    public function dropSchema(): void
    {
        $this->schemaTool->dropSchema($this->classes);
    }

    /**
     * @Given the database is empty
     *
     * @throws ToolsException
     */
    public function emptyDatabase(): void
    {
        $this->dropSchema();
        $this->createSchema();
    }

    /**
     * @Given the fixtures :fixturesFile are loaded
     * @Given the fixtures file :fixturesFile is loaded
     */
    public function thereAreFixtures(string $fixturesFile): void
    {
        $this->loader->load([self::FIXTURES_BASE_PATH.$fixturesFile]);
    }
}
