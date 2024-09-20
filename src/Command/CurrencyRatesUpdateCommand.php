<?php

declare(strict_types=1);

namespace App\Command;

use App\Collector\Currency\Collector;
use App\Persister\CollectionPersister;
use Symfony\Component\Console\Attribute\AsCommand;
use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;

#[AsCommand(
    name: 'currency-rates:update',
    description: 'Fetch and update currency rates',
)]
class CurrencyRatesUpdateCommand extends Command
{
    public function __construct(
        private readonly Collector $collector,
        private readonly CollectionPersister $collectionPersister,
    ) {
        parent::__construct();
    }

    public function configure(): void
    {
        $this->addOption('channel', 'c', InputArgument::OPTIONAL, 'Fetch data exclusively from specified channel');
    }

    protected function execute(InputInterface $input, OutputInterface $output): int
    {
        $output->writeln('Collecting data...', OutputInterface::VERBOSITY_VERBOSE);

        $channel = $input->getOption('channel');

        $currencies = $this->collector->collect(\is_string($channel) ? $channel : null);

        $output->writeln(\sprintf('Got %d.', $currencies->count()), OutputInterface::VERBOSITY_VERBOSE);
        $output->writeln('Persisting data...', OutputInterface::VERBOSITY_VERBOSE);

        $this->collectionPersister->persist($currencies);

        return Command::SUCCESS;
    }
}
