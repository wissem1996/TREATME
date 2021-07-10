<?php

namespace App\Repository;

use App\Entity\OxygenSupplier;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method OxygenSupplier|null find($id, $lockMode = null, $lockVersion = null)
 * @method OxygenSupplier|null findOneBy(array $criteria, array $orderBy = null)
 * @method OxygenSupplier[]    findAll()
 * @method OxygenSupplier[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class OxygenSupplierRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, OxygenSupplier::class);
    }

    // /**
    //  * @return OxygenSupplier[] Returns an array of OxygenSupplier objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('o')
            ->andWhere('o.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('o.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?OxygenSupplier
    {
        return $this->createQueryBuilder('o')
            ->andWhere('o.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
