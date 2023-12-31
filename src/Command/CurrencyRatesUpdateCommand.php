<?php

namespace App\Command;

use App\Entity\Currency;
use App\Ezb\Collector\RateCollector;
use App\Ezb\Response\Dto\CurrencyRate;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\Console\Attribute\AsCommand;
use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;
use Symfony\Component\Validator\Exception\ValidationFailedException;
use Symfony\Contracts\HttpClient\Exception\ClientExceptionInterface;
use Symfony\Contracts\HttpClient\Exception\RedirectionExceptionInterface;
use Symfony\Contracts\HttpClient\Exception\ServerExceptionInterface;
use Symfony\Contracts\HttpClient\Exception\TransportExceptionInterface;

#[AsCommand(
    name: 'currency-rates:update',
    description: 'Add a short description for your command',
)]
class CurrencyRatesUpdateCommand extends Command
{
    public function __construct(private readonly RateCollector $collector, private readonly EntityManagerInterface $entityManager)
    {
        parent::__construct();
    }

    /**
     * @throws TransportExceptionInterface
     * @throws ServerExceptionInterface
     * @throws RedirectionExceptionInterface
     * @throws ClientExceptionInterface
     * @throws ValidationFailedException
     */
    protected function execute(InputInterface $input, OutputInterface $output): int
    {
        // TODO: output only on verbose

        // TODO: error handling
        // TODO: call by handler (tag)
        $currencyRates = $this->collector->collect();

        /** @var CurrencyRate $currencyRate */
        foreach ($currencyRates as $currencyRate) {
            // TODO: move
            // TODO: should work on new and existing entities
            $currency = (new Currency($currencyRate->getIso3()))->setRate($currencyRate->getRate());
            $this->entityManager->persist($currency);
        }

        $this->entityManager->flush();

        return Command::SUCCESS;
    }
}
