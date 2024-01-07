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

class DatabaseContext implements Context
{
    /** @phpstan-var ClassMetadata<Currency|CurrencyRateHistory>[]  */
    private array $classes;

    public function __construct(
        private readonly EntityManagerInterface $entityManager, private readonly SchemaTool $schemaTool
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
}
