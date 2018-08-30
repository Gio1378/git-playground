<?php

namespace App\Repository;

use App\Entity\SubRecipesCategories;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Symfony\Bridge\Doctrine\RegistryInterface;

/**
 * @method SubRecipesCategories|null find($id, $lockMode = null, $lockVersion = null)
 * @method SubRecipesCategories|null findOneBy(array $criteria, array $orderBy = null)
 * @method SubRecipesCategories[]    findAll()
 * @method SubRecipesCategories[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class SubRecipesCategoriesRepository extends ServiceEntityRepository
{
    public function __construct(RegistryInterface $registry)
    {
        parent::__construct($registry, SubRecipesCategories::class);
    }

//    /**
//     * @return SubRecipesCategories[] Returns an array of SubRecipesCategories objects
//     */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('s')
            ->andWhere('s.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('s.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?SubRecipesCategories
    {
        return $this->createQueryBuilder('s')
            ->andWhere('s.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
