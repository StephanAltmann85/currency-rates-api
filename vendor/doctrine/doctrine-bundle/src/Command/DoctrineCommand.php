<?php

declare(strict_types=1);

namespace Doctrine\Bundle\DoctrineBundle\Command;

use Doctrine\DBAL\Connection;
use Doctrine\Persistence\ManagerRegistry;
use Symfony\Component\Console\Command\Command;

/**
 * Base class for Doctrine console commands to extend from.
 *
 * @internal
 */
abstract class DoctrineCommand extends Command
{
    public function __construct(
        private readonly ManagerRegistry $doctrine,
    ) {
        parent::__construct();
    }

    /**
     * Get a doctrine dbal connection by symfony name.
     */
    protected function getDoctrineConnection(string $name): Connection
    {
        return $this->getDoctrine()->getConnection($name);
    }

    protected function getDoctrine(): ManagerRegistry
    {
        return $this->doctrine;
    }
}
