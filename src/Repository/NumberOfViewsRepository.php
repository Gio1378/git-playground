<?php

namespace App\Repository;

use App\Entity\NumberOfViews;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Symfony\Bridge\Doctrine\RegistryInterface;

/**
 * @method NumberOfViews|null find($id, $lockMode = null, $lockVersion = null)
 * @method NumberOfViews|null findOneBy(array $criteria, array $orderBy = null)
 * @method NumberOfViews[]    findAll()
 * @method NumberOfViews[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class NumberOfViewsRepository extends ServiceEntityRepository
{
    public function __construct(RegistryInterface $registry)
    {
        parent::__construct($registry, NumberOfViews::class);
    }

//    /**
//     * @return NumberOfViews[] Returns an array of NumberOfViews objects
//     */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('n')
            ->andWhere('n.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('n.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?NumberOfViews
    {
        return $this->createQueryBuilder('n')
            ->andWhere('n.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
