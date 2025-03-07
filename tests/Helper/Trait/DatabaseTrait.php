<?php

declare(strict_types=1);

namespace App\Tests\Helper\Trait;

use Doctrine\ORM\EntityManagerInterface;
use Doctrine\ORM\Tools\SchemaTool;
use Doctrine\ORM\Tools\ToolsException;

trait DatabaseTrait
{
    protected EntityManagerInterface $entityManager;

    protected SchemaTool $schemaTool;

    /**
     * @throws ToolsException
     */
    protected function resetDatabase(): void
    {
        $classes = $this->entityManager->getMetadataFactory()->getAllMetadata();
        $this->schemaTool->dropSchema($classes);
        $this->schemaTool->createSchema($classes);
    }
}
