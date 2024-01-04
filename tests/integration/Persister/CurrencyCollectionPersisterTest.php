<?php

declare(strict_types=1);

namespace App\Tests\integration\Persister;

use Symfony\Bundle\FrameworkBundle\Test\KernelTestCase;

class CurrencyCollectionPersisterTest extends KernelTestCase
{
    public function setUp(): void
    {
        self::bootKernel();

        parent::setUp();
    }

    public function testPersist(): void
    {
        // TODO: test creation of new entitites
        // TODO: test update with history
        // TODO: test no history entry if nothing has changed
    }
}
