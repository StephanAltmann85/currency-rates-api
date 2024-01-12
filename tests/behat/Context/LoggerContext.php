<?php

declare(strict_types=1);

namespace App\Tests\behat\Context;

use Behat\Behat\Context\Context;
use Behat\Gherkin\Node\PyStringNode;
use League\Flysystem\FilesystemException;
use League\Flysystem\FilesystemOperator;
use Symfony\Component\DependencyInjection\Attribute\Autowire;
use Webmozart\Assert\Assert;

class LoggerContext implements Context
{
    private string $logContent = '';

    public function __construct(
        #[Autowire(service: 'logFile.storage')]
        private readonly FilesystemOperator $logFileStorage,
    ) {
    }

    /**
     * @Given the log file :name has been deleted
     *
     * @throws FilesystemException
     */
    public function theLogFileHasBeenDeleted(string $fileName): void
    {
        $this->logFileStorage->delete($fileName);
        $this->logContent = '';
    }

    /**
     * @When I read the log file :name
     *
     * @throws FilesystemException
     */
    public function iReadTheLogFile(string $fileName): void
    {
        Assert::true($this->logFileStorage->fileExists($fileName));
        $this->logContent = $this->logFileStorage->read($fileName);
    }

    /**
     * @Then the log file :name does not exist
     *
     * @throws FilesystemException
     */
    public function theLogFileDoesNotExist(string $fileName): void
    {
        Assert::false($this->logFileStorage->fileExists($fileName));
    }

    /**
     * @Then the log file contains:
     */
    public function theLogFileContains(PyStringNode $contains): void
    {
        Assert::contains($this->logContent, $contains->getRaw());
    }
}
