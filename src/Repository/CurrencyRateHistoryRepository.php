<?php

namespace App\Repository;

use App\Entity\CurrencyRateHistory;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<CurrencyRateHistory>
 *
 * @method CurrencyRateHistory|null find($id, $lockMode = null, $lockVersion = null)
 * @method CurrencyRateHistory|null findOneBy(array $criteria, array $orderBy = null)
 * @method CurrencyRateHistory[]    findAll()
 * @method CurrencyRateHistory[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class CurrencyRateHistoryRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, CurrencyRateHistory::class);
    }
}
