<?php

namespace App\Repository;

use App\Entity\OffersRecipes;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Symfony\Bridge\Doctrine\RegistryInterface;

/**
 * @method OffersRecipes|null find($id, $lockMode = null, $lockVersion = null)
 * @method OffersRecipes|null findOneBy(array $criteria, array $orderBy = null)
 * @method OffersRecipes[]    findAll()
 * @method OffersRecipes[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class OffersReceipesRepository extends ServiceEntityRepository
{
    public function __construct(RegistryInterface $registry)
    {
        parent::__construct($registry, OffersRecipes::class);
    }

//    /**
//     * @return OffersReceipes[] Returns an array of OffersReceipes objects
//     */
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
    public function findOneBySomeField($value): ?OffersReceipes
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
