<?php

namespace App\Repository;

use App\Entity\Recipes;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Symfony\Bridge\Doctrine\RegistryInterface;

/**
 * @method Recipes|null find($id, $lockMode = null, $lockVersion = null)
 * @method Recipes|null findOneBy(array $criteria, array $orderBy = null)
 * @method Recipes[]    findAll()
 * @method Recipes[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class RecipesRepository extends ServiceEntityRepository
{
    public function __construct(RegistryInterface $registry)
    {
        parent::__construct($registry, Recipes::class);
    }

    /**
     * @return mixed
     * @throws \Doctrine\ORM\NonUniqueResultException
     */
    public function getRecipeCount()
    {
        return $this->createQueryBuilder('a')
            ->select('COUNT(a)')
            ->getQuery()
            ->getSingleScalarResult()
            ;
    }

    /**
     * @param $page
     * @param $nbOfElementPerPage
     * @return mixed
     */
    public function getRecipesPaginated($page, $nbOfElementPerPage)
    {
        return $this->createQueryBuilder('a')
            ->select('a')
            ->setMaxResults($nbOfElementPerPage)
            ->setFirstResult(($page - 1) * $nbOfElementPerPage)
            ->orderBy('a.name', 'DESC')
            ->getQuery()
            ->getResult()
            ;
    }
}