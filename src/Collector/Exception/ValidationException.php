<?php

declare(strict_types=1);

namespace App\Collector\Exception;

use Symfony\Component\Validator\Exception\ValidationFailedException;

class ValidationException extends ValidationFailedException implements CollectDataException
{
}
