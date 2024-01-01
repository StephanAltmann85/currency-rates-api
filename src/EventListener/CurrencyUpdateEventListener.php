<?php

declare(strict_types=1);

namespace App\EventListener;

use App\Entity\Currency;
use App\Entity\CurrencyRateHistory;
use Doctrine\Bundle\DoctrineBundle\Attribute\AsEntityListener;
use Doctrine\ORM\Event\PreUpdateEventArgs;
use Doctrine\ORM\Events;

#[AsEntityListener(event: Events::preUpdate, method: 'onUpdate', entity: Currency::class)]
class CurrencyUpdateEventListener
{
    public function __construct()
    {
    }

    public function onUpdate(Currency $currency, PreUpdateEventArgs $event): void
    {
        // TODO: different event for persisting history
        /*        $history = (new CurrencyRateHistory())
                    ->setRate($event->getOldValue('rate'))
                    ->setDate($currency->getUpdatedAt())
                    ->setCurrency($currency);*/

        $currency->setUpdatedAt(new \DateTime());
    }
}
