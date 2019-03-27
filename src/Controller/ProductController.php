<?php

namespace App\Controller;

use App\Model\Product;
use App\Repository\ProductRepositoryInterface;
use FOS\RestBundle\Controller\AbstractFOSRestController;
use FOS\RestBundle\View\View;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use FOS\RestBundle\Controller\Annotations as Rest;

/**
 * Class ProductController
 * @package App\Controller
 */
class ProductController extends AbstractFOSRestController
{
    /**
     * @var ProductRepositoryInterface
     */
    private $productRepository;

    /**
     * ProductController constructor.
     * @param ProductRepositoryInterface $productRepository
     */
    public function __construct(ProductRepositoryInterface $productRepository)
    {
        $this->productRepository = $productRepository;
    }

    /**
     * Retrieves a collection of Product resource
     * @Rest\Get("/products")
     */
    public function getProducts()
    {
        $products = $this->productRepository->getAll();

        return View::create($products, Response::HTTP_OK);
    }

    /**
     * Creates an Product resource
     * @Rest\Post("/products")
     * @param Request $request
     * @return View
     */
    public function createProduct(Request $request)
    {
        $product = new Product();
        $product->setName($request->get('name'));
        $product->setSku($request->get('sku'));
        $product->setQuantity($request->get('quantity'));

        $this->productRepository->create($product);

        return View::create($product, Response::HTTP_CREATED);
    }

    /**
     * updates the Product resource
     * @Rest\Put("/products/{productId}")
     * @param string $productId
     * @param Request $request
     * @return View
     */
    public function putProduct(string $productId, Request $request)
    {
        $product = $this->productRepository->getById($productId);

        if ($product) {
            $product->setName($request->get('name'));
            $product->setSku($request->get('sku'));
            $product->setQuantity($request->get('quantity'));

            $this->productRepository->update($product);
        }

        return View::create($product, Response::HTTP_OK);
    }

    /**
     * Deletes the Product resource
     * @Rest\Delete("/products/{productId}")
     * @param string $productId
     * @return View
     */
    public function deleteProduct(string $productId)
    {
        $product = $this->productRepository->getById($productId);

        if ($product) {
            $this->productRepository->delete($product);
        }

        return View::create($product, Response::HTTP_OK);
    }
}