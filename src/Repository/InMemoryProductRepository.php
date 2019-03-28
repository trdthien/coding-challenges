<?php

namespace App\Repository;


use App\Model\Product;
use App\Model\ResourceNotFoundException;

/**
 * Class InMemoryProductRepository
 * @package App\Repository
 */
class InMemoryProductRepository implements ProductRepositoryInterface
{
    /**
     * @var Product[]
     */
    private $products = [];

    public function __construct()
    {
        $product = new Product();
        $product->setId('1');
        $product->setName('whatever');
        $product->setSku('11111');
        $product->setQuantity(100);

        $this->products[] = $product;
    }

    public function getAll()
    {
        return $this->products;
    }

    public function getById(string $id)
    {
        foreach ($this->products as $product) {
            if ($product->getId() == $id) {
                return $product;
            }
        }
    }

    public function create(Product $product)
    {
        $this->products[] = $product;

        return true;
    }

    public function update(Product $product)
    {
        $exist = false;

        foreach ($this->products as $k => $v) {
            if ($v->getId() == $product->getId()) {
                $this->products[$k] = $product;
                $exist = true;
            }
        }

        if (!$exist) {
            throw new ResourceNotFoundException();
        }

        return true;
    }

    public function delete(Product $product)
    {
        $exist = false;

        foreach ($this->products as $k => $v) {
            if ($v->getId() == $product->getId()) {
                unset($this->products[$k]);
                $exist = true;
            }
        }

        if (!$exist) {
            throw new ResourceNotFoundException();
        }

        return true;
    }
}