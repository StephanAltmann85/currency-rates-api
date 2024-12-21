<?php

declare(strict_types=1);

namespace App\Collector\Currency\Validation;

use App\Client\Response\ResponseInterface;
use Symfony\Component\Validator\ConstraintViolationListInterface;

interface ValidatorInterface
{
    /** @param string[]|null $validationGroups */
    public function validate(ResponseInterface $response, ?array $validationGroups): ConstraintViolationListInterface;

    /** @param string[]|null $validationGroups */
    public function tryValidate(ResponseInterface $response, ?array $validationGroups): ConstraintViolationListInterface;
}
