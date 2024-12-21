<?php

declare(strict_types=1);

namespace App\Tests\unit\Collector\Currency\Validation;

use App\Client\Response\ResponseInterface;
use App\Collector\Currency\Validation\Validator;
use Mockery\Adapter\Phpunit\MockeryTestCase;
use Mockery\MockInterface;
use PHPUnit\Framework\Attributes\CoversClass;
use Symfony\Component\Validator\ConstraintViolationListInterface;
use Symfony\Component\Validator\Exception\ValidationFailedException;
use Symfony\Component\Validator\Validator\ValidatorInterface;

#[CoversClass(Validator::class)]
class ValidatorTest extends MockeryTestCase
{
    /** @phpstan-var ValidatorInterface|MockInterface */
    private ValidatorInterface $symfonyValidator;
    private Validator $validator;

    protected function setUp(): void
    {
        parent::setUp();
        $this->symfonyValidator = \Mockery::mock(ValidatorInterface::class);
        $this->validator = new Validator($this->symfonyValidator);
    }

    public function testValidateSuccess(): void
    {
        $data = \Mockery::mock(ResponseInterface::class);
        $constraintViolationList = \Mockery::mock(ConstraintViolationListInterface::class);

        $this->symfonyValidator
            ->shouldReceive('validate')
            ->with($data, null, null)
            ->andReturn($constraintViolationList);

        $constraintViolationList
            ->shouldReceive('count')
            ->andReturn(0);

        $result = $this->validator->validate($data, null);
        $this->assertEquals($constraintViolationList, $result);
    }

    public function testValidateWillThrowValidationException(): void
    {
        $data = \Mockery::mock(ResponseInterface::class);
        $constraintViolationList = \Mockery::mock(ConstraintViolationListInterface::class);

        $this->symfonyValidator
            ->shouldReceive('validate')
            ->with($data, null, ['test:group'])
            ->andReturn($constraintViolationList);

        $constraintViolationList
            ->shouldReceive('count')
            ->andReturn(1);

        $this->expectExceptionObject(new ValidationFailedException('Validation failed!', $constraintViolationList));

        $this->validator->validate($data, ['test:group']);
    }

    public function testTryValidate(): void
    {
        $data = \Mockery::mock(ResponseInterface::class);
        $constraintViolationList = \Mockery::mock(ConstraintViolationListInterface::class);

        $this->symfonyValidator
            ->shouldReceive('validate')
            ->with($data, null, null)
            ->andReturn($constraintViolationList);

        $result = $this->validator->tryValidate($data, null);
        $this->assertEquals($constraintViolationList, $result);
    }
}
