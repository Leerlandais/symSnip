<?php

namespace App\Repository;

use App\Entity\MainCode;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<MainCode>
 */
class MainCodeRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, MainCode::class);
    }

    //    /**
    //     * @return MainCode[] Returns an array of MainCode objects
    //     */
    //    public function findByExampleField($value): array
    //    {
    //        return $this->createQueryBuilder('m')
    //            ->andWhere('m.exampleField = :val')
    //            ->setParameter('val', $value)
    //            ->orderBy('m.id', 'ASC')
    //            ->setMaxResults(10)
    //            ->getQuery()
    //            ->getResult()
    //        ;
    //    }

    //    public function findOneBySomeField($value): ?MainCode
    //    {
    //        return $this->createQueryBuilder('m')
    //            ->andWhere('m.exampleField = :val')
    //            ->setParameter('val', $value)
    //            ->getQuery()
    //            ->getOneOrNullResult()
    //        ;
    //    }

    public function getCodeTypes (): array
    {
        return $this->createQueryBuilder('m')
            ->select('DISTINCT m.type')
            ->getQuery()
            ->getResult()
            ;
    }

    public function getAllCodeByOneType ($type): array
    {
        return $this->createQueryBuilder('m')
            ->where('m.type = :type')
            ->setParameter('type', $type)
            ->getQuery()
            ->getResult()
            ;
    }
}
