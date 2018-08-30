<?php

namespace App\Repository;

use App\Entity\RecipesCategories;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Symfony\Bridge\Doctrine\RegistryInterface;

/**
 * @method RecipesCategories|null find($id, $lockMode = null, $lockVersion = null)
 * @method RecipesCategories|null findOneBy(array $criteria, array $orderBy = null)
 * @method RecipesCategories[]    findAll()
 * @method RecipesCategories[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class RecipesCategoriesRepository extends ServiceEntityRepository
{
    public function __construct(RegistryInterface $registry)
    {
        parent::__construct($registry, RecipesCategories::class);
    }

//    /**
//     * @return RecipesCategories[] Returns an array of RecipesCategories objects
//     */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('r')
            ->andWhere('r.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('r.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?RecipesCategories
    {
        return $this->createQueryBuilder('r')
            ->andWhere('r.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
