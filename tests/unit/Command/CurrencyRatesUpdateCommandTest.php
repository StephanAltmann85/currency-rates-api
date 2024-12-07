<?php

declare(strict_types=1);

namespace App\Tests\unit\Command;

use App\Collector\Currency\Collector;
use App\Command\CurrencyRatesUpdateCommand;
use App\Persister\CollectionPersister;
use Doctrine\Common\Collections\Collection;
use Mockery\MockInterface;
use PHPUnit\Framework\Attributes\CoversClass;
use PHPUnit\Framework\TestCase;
use Symfony\Component\Console\Application;
use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Tester\CommandTester;

#[CoversClass(CurrencyRatesUpdateCommand::class)]
class CurrencyRatesUpdateCommandTest extends TestCase
{
    /** @phpstan-var Collector|MockInterface  */
    private Collector $collector;

    /** @phpstan-var CollectionPersister|MockInterface  */
    private CollectionPersister $persister;

    private CommandTester $tester;

    protected function setUp(): void
    {
        $this->collector = \Mockery::mock(Collector::class);
        $this->persister = \Mockery::mock(CollectionPersister::class);

        $currencyRatesUpdateCommand = new CurrencyRatesUpdateCommand(
            $this->collector,
            $this->persister
        );

        $application = new Application();
        $application->add($currencyRatesUpdateCommand);
        $command = $application->find('currency-rates:update');

        $this->tester = new CommandTester($command);
    }

    public function testRun(): void
    {
        $currencies = \Mockery::mock(Collection::class);

        $this->collector
            ->shouldReceive('collect')
            ->once()
            ->with(null)
            ->andReturn($currencies);

        $currencies
            ->shouldReceive('count')
            ->once()
            ->andReturn(10);

        $this->persister
            ->shouldReceive('persist')
            ->once()
            ->with($currencies)
            ->andReturn();

        $result = $this->tester->execute(['command' => 'currency-rates:update']);

        $this->assertEmpty($this->tester->getDisplay());
        $this->assertEquals(Command::SUCCESS, $result);
    }

    public function testRunWithChannelOption(): void
    {
        $currencies = \Mockery::mock(Collection::class);

        $this->collector
            ->shouldReceive('collect')
            ->once()
            ->with('ECB')
            ->andReturn($currencies);

        $currencies
            ->shouldReceive('count')
            ->once()
            ->andReturn(10);

        $this->persister
            ->shouldReceive('persist')
            ->once()
            ->with($currencies)
            ->andReturn();

        $result = $this->tester->execute(['command' => 'currency-rates:update', '--channel' => 'ECB']);

        $this->assertEmpty($this->tester->getDisplay());
        $this->assertEquals(Command::SUCCESS, $result);
    }
}
