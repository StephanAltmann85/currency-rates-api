<?php

declare(strict_types=1);

namespace App\Persister;

use App\Entity\Currency;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\EntityManagerInterface;

readonly class CurrencyCollectionPersister implements CollectionPersister
{
    public function __construct(private EntityManagerInterface $entityManager)
    {
    }

    /** @param Collection<int, Currency> $collection */
    public function persist(Collection $collection): void
    {
        foreach ($collection as $currency) {
            $this->entityManager->persist($currency);
        }

        $this->entityManager->flush();
    }
}
