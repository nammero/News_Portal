<?php

namespace App\Repository;

use App\Category\Repository\CategoryRepositoryInterface;
use App\Entity\Category;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Symfony\Bridge\Doctrine\RegistryInterface;

/**
 * @method Category|null find($id, $lockMode = null, $lockVersion = null)
 * @method Category|null findOneBy(array $criteria, array $orderBy = null)
 * @method Category[]    findAll()
 * @method Category[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class CategoryRepository extends ServiceEntityRepository implements CategoryRepositoryInterface
{
    public function __construct(RegistryInterface $registry)
    {
        parent::__construct($registry, Category::class);
    }

    public function findBySlug(string $slug): ?Category
    {
        return $this->createQueryBuilder('c')
            ->where('c.slug = :slug')
            ->setParameter('slug', $slug)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
//
//    public function findCategoriesList(): array
//    {
//        return $this->createQueryBuilder('c')
//            ->select('c.title')
//            ->getQuery()
//            ->getArrayResult();
//    }
}
