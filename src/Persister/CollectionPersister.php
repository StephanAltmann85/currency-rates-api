<?php

declare(strict_types=1);

namespace App\Persister;

use Doctrine\Common\Collections\Collection;

interface CollectionPersister
{
    /**
     * @phpstan-template T
     *
     * @phpstan-param Collection<int, T> $collection
     */
    public function persist(Collection $collection): void;
}
