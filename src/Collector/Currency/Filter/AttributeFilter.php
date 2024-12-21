<?php

declare(strict_types=1);

namespace App\Collector\Currency\Filter;

use Doctrine\Common\Collections\Collection;

interface AttributeFilter
{
    /**
     * @template TKey of array-key
     * @template T
     *
     * @param Collection<TKey, T> $data
     *
     * @return Collection<TKey, T>
     */
    public function filter(object $attributedClass, Collection $data): Collection;
}
