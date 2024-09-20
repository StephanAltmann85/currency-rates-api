<?php

declare(strict_types=1);

namespace App\Tests\behat\Context;

use Behat\Behat\Context\Context;
use Behat\Gherkin\Node\PyStringNode;
use Symfony\Bundle\FrameworkBundle\Console\Application;
use Symfony\Component\Console\Input\ArgvInput;
use Symfony\Component\Console\Output\BufferedOutput;
use Symfony\Component\Console\Output\OutputInterface;
use Symfony\Component\HttpKernel\KernelInterface;
use Webmozart\Assert\Assert;

class CommandContext implements Context
{
    private Application $application;

    private OutputInterface|BufferedOutput $output;

    private ?string $outputString = null;

    public function __construct(
        private readonly KernelInterface $kernel,
    ) {
        $this->application = new Application($this->kernel);
        $this->output = new BufferedOutput();
    }

    /**
     * @When I run Command :command
     * @When I run Command :command with :arguments
     */
    public function runCommand(string $command, string $arguments = ''): void
    {
        $inputContent = ['behat-test', $command, '--env=test'];

        if (!empty($arguments)) {
            $inputContent = array_merge($inputContent, explode(' ', $arguments));
        }

        $input = new ArgvInput($inputContent);
        $this->application->doRun($input, $this->output);
    }

    /**
     * @Then the output should contain:
     */
    public function checkOutputContains(PyStringNode $output): void
    {
        if (!isset($this->outputString)) {
            /* @phpstan-ignore-next-line */
            $this->outputString = $this->output->fetch();
        }

        Assert::contains($this->outputString, $output->getRaw());
    }
}
