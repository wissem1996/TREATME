<?php

namespace App\Repository;

use App\Entity\Oxygene;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method Oxygene|null find($id, $lockMode = null, $lockVersion = null)
 * @method Oxygene|null findOneBy(array $criteria, array $orderBy = null)
 * @method Oxygene[]    findAll()
 * @method Oxygene[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class OxygeneRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Oxygene::class);
    }

    // /**
    //  * @return Oxygene[] Returns an array of Oxygene objects
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
    public function findOneBySomeField($value): ?Oxygene
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
