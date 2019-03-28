<?php

namespace App\Service;

use App\Model\Category;
use App\Model\Money;
use App\Model\Price;
use App\Model\Product;
use App\Model\ResourceNotFoundException;
use App\Repository\CategoryRepositoryInterface;
use App\Repository\ProductRepositoryInterface;

class ProductService
{
    /**
     * @var ProductRepositoryInterface
     */
    private $productRepository;
    /**
     * @var CategoryRepositoryInterface
     */
    private $categoryRepository;

    /**
     * ProductService constructor.
     * @param ProductRepositoryInterface $productRepository
     * @param CategoryRepositoryInterface $categoryRepository
     */
    public function __construct(
        ProductRepositoryInterface $productRepository,
        CategoryRepositoryInterface $categoryRepository
    ){
        $this->productRepository = $productRepository;
        $this->categoryRepository = $categoryRepository;
    }

    /**
     * @param string $id
     * @return mixed
     */
    public function getProduct(string $id)
    {
        return $this->productRepository->getById($id);
    }

    /**
     * @return mixed
     */
    public function getProducts()
    {
        return $this->productRepository->getAll();
    }

    /**
     * @param ProductCreateRequest $request
     * @return Product
     */
    public function create(ProductCreateRequest $request)
    {
        $product = new Product();
        $product->setName($request->getName());
        $product->setSku($request->getSku());
        $product->setQuantity($request->getQuantity());

        // category
        $categoryName = $request->getCategory();
        $category = $this->categoryRepository->getOneBy(['name' => $categoryName]);

        if (!$category) {
            $category = new Category();
            $category->setName($categoryName);
            $this->categoryRepository->create($category);
        }

        $product->setCategory($category);

        // price
        if ($request->getPrice()) {
            $price = new Price();
            $price->setValue(
                Money::fromCurrencyAndAmount('USD', $request->getPrice())
            );
            $product->setPrice($price);
        }

        // good to go
        $this->productRepository->create($product);

        return $product;
    }

    /**
     * @param ProductUpdateRequest $request
     * @return Product
     */
    public function update(ProductUpdateRequest $request)
    {
        /** @var Product $product */
        $product = $this->productRepository->getById($request->getProductId());

        if ($product) {
            $product->setName($request->getName());
            $product->setSku($request->getSku());
            $product->setQuantity($request->getQuantity());

            // category
            $categoryName = $request->getCategory();
            $category = $this->categoryRepository->getOneBy(['name' => $categoryName]);

            if (!$category) {
                $category = new Category();
                $category->setName($categoryName);
                $this->categoryRepository->create($category);
            }

            $product->setCategory($category);
            // price
            if ($request->getPrice()) {
                $price = new Price();
                $price->setValue(
                    Money::fromCurrencyAndAmount('USD', $request->getPrice())
                );
                $product->setPrice($price);
            }

            $this->productRepository->update($product);

            return $product;
        }

        // TODO: need a different exception?
        throw new ResourceNotFoundException('no content');
    }

    /**
     * @param string $productId
     * @return mixed
     */
    public function delete(string $productId)
    {
        $product = $this->productRepository->delete($productId);

        if ($product) {
            $this->productRepository->delete($product);

            return $product;
        }

        // TODO: need a different exception?
        throw new ResourceNotFoundException('no content');
    }
}