<?php

namespace App\Repository;

use App\Entity\ElementaryIngredients;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Symfony\Bridge\Doctrine\RegistryInterface;

/**
 * @method ElementaryIngredients|null find($id, $lockMode = null, $lockVersion = null)
 * @method ElementaryIngredients|null findOneBy(array $criteria, array $orderBy = null)
 * @method ElementaryIngredients[]    findAll()
 * @method ElementaryIngredients[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class ElementaryIngredientsRepository extends ServiceEntityRepository
{
    public function __construct(RegistryInterface $registry)
    {
        parent::__construct($registry, ElementaryIngredients::class);
    }

//    /**
//     * @return ElementaryIngredients[] Returns an array of ElementaryIngredients objects
//     */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('e')
            ->andWhere('e.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('e.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?ElementaryIngredients
    {
        return $this->createQueryBuilder('e')
            ->andWhere('e.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
