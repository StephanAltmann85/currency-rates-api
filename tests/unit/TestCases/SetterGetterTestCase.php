<?php

namespace App\Tests\unit\TestCases;

use Mockery\Adapter\Phpunit\MockeryTestCase;

abstract class SetterGetterTestCase extends MockeryTestCase
{
    protected function performSetterGetterCalls(string $setter, string $getter, mixed $value, bool $expectTypeError = false): void
    {
        $object = $this->getTarget();

        if (false === $expectTypeError) {
            $object->$setter($value);
            $this->assertEquals($value, $object->$getter());

            return;
        }

        $this->expectException(\Throwable::class);
        $object->$setter($value);
    }

    /**
     * @throws \ReflectionException
     */
    public function setByReflection(object $entity, string $property, mixed $value): void
    {
        $class = new \ReflectionClass($entity);
        $property = $class->getProperty($property);
        $property->setAccessible(true);

        $property->setValue($entity, $value);
    }

    abstract protected function getTarget(): object;
}
