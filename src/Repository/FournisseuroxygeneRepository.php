<?php

namespace App\Repository;

use App\Entity\Fournisseuroxygene;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method Fournisseuroxygene|null find($id, $lockMode = null, $lockVersion = null)
 * @method Fournisseuroxygene|null findOneBy(array $criteria, array $orderBy = null)
 * @method Fournisseuroxygene[]    findAll()
 * @method Fournisseuroxygene[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class FournisseuroxygeneRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Fournisseuroxygene::class);
    }

    // /**
    //  * @return Fournisseuroxygene[] Returns an array of Fournisseuroxygene objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('f')
            ->andWhere('f.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('f.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?Fournisseuroxygene
    {
        return $this->createQueryBuilder('f')
            ->andWhere('f.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
