<?php

namespace App\Repository;

use App\Model\Product;

/**
 * Interface ProductRepositoryInterface
 */
interface ProductRepositoryInterface
{
    public function getAll();

    public function getById(string $id);

    public function create(Product $product);

    public function update(Product $product);

    public function delete(Product $product);
}