<?php

declare(strict_types=1);

namespace App\EventListener;

use App\Entity\Currency;
use App\Entity\CurrencyRateHistory;
use Doctrine\Bundle\DoctrineBundle\Attribute\AsDoctrineListener;
use Doctrine\Bundle\DoctrineBundle\Attribute\AsEntityListener;
use Doctrine\ORM\Event\OnFlushEventArgs;
use Doctrine\ORM\Events;

#[AsEntityListener(event: Events::preUpdate, method: 'onUpdate', entity: Currency::class)]
#[AsDoctrineListener(event: Events::onFlush)]
class CurrencyUpdateEventListener
{
    public function onUpdate(Currency $currency): void
    {
        $currency->setUpdatedAt(new \DateTime());
    }

    public function onFlush(OnFlushEventArgs $args): void
    {
        $entityManager = $args->getObjectManager();
        $unitOfWork = $entityManager->getUnitOfWork();

        foreach ($unitOfWork->getScheduledEntityUpdates() as $updatedEntity) {
            if (!$updatedEntity instanceof Currency) {
                continue;
            }

            $changeSet = $unitOfWork->getEntityChangeSet($updatedEntity);

            if (!\is_array($changeSet)) {
                continue;
            }

            /** @phpstan-var array<string, array<int, mixed>> $changeSet */
            if (false === \array_key_exists('rate', $changeSet) || false === \array_key_exists(0, $changeSet['rate']) || false === is_numeric($changeSet['rate'][0])) {
                continue;
            }

            $currencyRateHistory = (new CurrencyRateHistory())
                ->setRate((float) $changeSet['rate'][0])
                ->setDate($updatedEntity->getUpdatedAt())
                ->setCurrency($updatedEntity);

            $entityManager->persist($currencyRateHistory);

            $logMetadata = $entityManager->getClassMetadata(CurrencyRateHistory::class);
            $unitOfWork->computeChangeSet($logMetadata, $currencyRateHistory);
        }
    }
}
