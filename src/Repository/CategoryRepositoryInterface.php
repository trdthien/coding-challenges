<?php

namespace App\Repository;

use App\Model\Category;

/**
 * Interface CategoryRepositoryInterface
 * @package App\Repository
 */
interface CategoryRepositoryInterface
{
    public function getAll();

    public function getById(string $id);

    public function getOneBy(array $criteria);

    public function create(Category $category);
}