<?php

namespace App\Command;

use App\Collector\Currency\Collector;
use App\Collector\Exception\CollectDataException;
use App\Persister\CollectionPersister;
use Symfony\Component\Console\Attribute\AsCommand;
use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;

#[AsCommand(
    name: 'currency-rates:update',
    description: 'Add a short description for your command',
)]
class CurrencyRatesUpdateCommand extends Command
{
    public function __construct(
        private readonly Collector $collector,
        private readonly CollectionPersister $collectionPersister
    ) {
        parent::__construct();
    }

    /**
     * @throws CollectDataException
     */
    protected function execute(InputInterface $input, OutputInterface $output): int
    {
        // TODO: output only on verbose

        $currencies = $this->collector->collect();

        $this->collectionPersister->persist($currencies);

        // TODO: error handling with channel

        // var_dump($currencies);

        // TODO: move
        // TODO: should work on new and existing entities

        return Command::SUCCESS;
    }
}
