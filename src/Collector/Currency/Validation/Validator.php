<?php

declare(strict_types=1);

namespace App\Collector\Currency\Validation;

use App\Client\Response\ResponseInterface;
use App\Collector\Currency\Channel\Ecb\Response\GetRatesResponse;
use App\Collector\Exception\ValidationException;
use Symfony\Component\Validator\ConstraintViolationListInterface;
use Symfony\Component\Validator\Validator\ValidatorInterface as SymfonyValidatorInterface;

readonly class Validator implements ValidatorInterface
{
    public function __construct(
        private SymfonyValidatorInterface $validator,
    ) {
    }

    public function validate(ResponseInterface $response, ?array $validationGroups): ConstraintViolationListInterface
    {
        $violations = $this->tryValidate($response, $validationGroups);

        if ($violations->count() > 0) {
            throw new ValidationException(GetRatesResponse::class, $violations);
        }

        return $violations;
    }

    public function tryValidate(ResponseInterface $response, ?array $validationGroups): ConstraintViolationListInterface
    {
        return $this->validator->validate($response, null, $validationGroups);
    }
}
