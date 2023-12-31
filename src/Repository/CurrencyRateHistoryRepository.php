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

    //    /**
    //     * @return CurrencyRateHistory[] Returns an array of CurrencyRateHistory objects
    //     */
    //    public function findByExampleField($value): array
    //    {
    //        return $this->createQueryBuilder('c')
    //            ->andWhere('c.exampleField = :val')
    //            ->setParameter('val', $value)
    //            ->orderBy('c.id', 'ASC')
    //            ->setMaxResults(10)
    //            ->getQuery()
    //            ->getResult()
    //        ;
    //    }

    //    public function findOneBySomeField($value): ?CurrencyRateHistory
    //    {
    //        return $this->createQueryBuilder('c')
    //            ->andWhere('c.exampleField = :val')
    //            ->setParameter('val', $value)
    //            ->getQuery()
    //            ->getOneOrNullResult()
    //        ;
    //    }
}
