<?php

namespace App\Repository;

use App\Entity\CategoriePrincipal;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method CategoriePrincipal|null find($id, $lockMode = null, $lockVersion = null)
 * @method CategoriePrincipal|null findOneBy(array $criteria, array $orderBy = null)
 * @method CategoriePrincipal[]    findAll()
 * @method CategoriePrincipal[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class CategoriePrincipalRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, CategoriePrincipal::class);
    }

    // /**
    //  * @return CategoriePrincipal[] Returns an array of CategoriePrincipal objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('c')
            ->andWhere('c.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('c.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?CategoriePrincipal
    {
        return $this->createQueryBuilder('c')
            ->andWhere('c.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
