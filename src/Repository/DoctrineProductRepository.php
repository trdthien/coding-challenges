<?php

namespace App\Repository;

use App\Model\Product;
use App\Model\ResourceNotFoundException;
use Doctrine\ORM\EntityManager;

/**
 * Class DoctrineProductRepository
 * @package App\Repository
 */
class DoctrineProductRepository implements ProductRepositoryInterface
{
    private $em;

    public function __construct(EntityManager $entityManager)
    {
        $this->em = $entityManager;
    }

    public function getAll()
    {
        return $products = $this->em->getRepository(Product::class)->findAll();
    }

    public function getById(string $id)
    {
        $product = $this->em->getRepository(Product::class)->find($id);

        if (!$product) {
            throw new ResourceNotFoundException('product not found');
        }

        return $product;
    }

    public function create(Product $product)
    {
        $this->em->persist($product);
        $this->em->flush();

        return true;
    }

    public function update(Product $product)
    {
        $this->em->persist($product);
        $this->em->flush();

        return true;
    }

    public function delete(Product $product)
    {
        $this->em->remove($product);
        $this->em->flush();

        return true;
    }
}