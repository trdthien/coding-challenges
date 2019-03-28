<?php

namespace App\Repository;

use App\Model\Category;
use App\Model\ResourceNotFoundException;
use Doctrine\ORM\EntityManager;

/**
 * Class DoctrineCategoryRepository
 * @package App\Repository
 */
class DoctrineCategoryRepository implements CategoryRepositoryInterface
{
    private $em;

    public function __construct(EntityManager $entityManager)
    {
        $this->em = $entityManager;
    }

    public function getAll()
    {
        $categories = $this->em->getRepository(Category::class)
            ->findAll();

        return $categories;
    }

    public function getById(string $id)
    {
        $category = $this->em->getRepository(Category::class)
            ->find($id);

        if (!$category) {
            throw new ResourceNotFoundException('category not found');
        }

        return $category;
    }

    public function getOneBy(array $criteria)
    {
        $category = $this->em->getRepository(Category::class)
            ->findOneBy($criteria);

        return $category;
    }

    public function create(Category $category)
    {
        $this->em->persist($category);
        $this->em->flush();

        return true;
    }
}