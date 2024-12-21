<?php

declare(strict_types=1);

namespace App\Client\Response;

interface ResponseInterface
{
    /** @return string[]|null */
    public function getValidationGroups(): ?array;
}
