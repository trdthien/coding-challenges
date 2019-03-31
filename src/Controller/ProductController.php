<?php

namespace App\Controller;

use App\Service\ProductCreateRequest;
use App\Service\ProductUpdateRequest;
use App\Service\ProductService;
use FOS\RestBundle\Controller\AbstractFOSRestController;
use FOS\RestBundle\View\View;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Security;
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
     * @var ProductService
     */
    private $productService;

    /**
     * ProductController constructor.
     * @param ProductService $productService
     */
    public function __construct(ProductService $productService)
    {
        $this->productService = $productService;
    }

    /**
     * Retrieves a collection of Product resource
     * @Rest\Get("/products")
     */
    public function getProducts()
    {
        $products = $this->productService->getProducts();

        return View::create($products, Response::HTTP_OK);
    }

    /**
     * Retrieves a collection of Product resource
     * @Rest\Get("/products/{productId}")
     * @param string $productId
     * @return View
     */
    public function getProduct(string $productId)
    {
        $product = $this->productService->getProduct($productId);

        return View::create($product, Response::HTTP_OK);
    }

    /**
     * Creates an Product resource
     * @Rest\Post("/products")
     * @param Request $request
     * @Security("has_role('ROLE_USER')")
     * @return View
     */
    public function createProduct(Request $request)
    {
        $product = $this->productService->create(
            new ProductCreateRequest(
                $request->get('name'),
                $request->get('sku'),
                $request->get('category'),
                $request->get('quantity'),
                $request->get('price')
            )
        );

        return View::create($product, Response::HTTP_CREATED);
    }

    /**
     * updates the Product resource
     * @Rest\Put("/products/{productId}")
     * @param string $productId
     * @param Request $request
     * @Security("has_role('ROLE_USER')")
     * @return View
     */
    public function putProduct(string $productId, Request $request)
    {
        $product = $this->productService->update(
            new ProductUpdateRequest(
                $productId,
                $request->get('name'),
                $request->get('sku'),
                $request->get('category'),
                $request->get('quantity'),
                $request->get('price')
            )
        );

        return View::create($product, Response::HTTP_OK);
    }

    /**
     * Deletes the Product resource
     * @Rest\Delete("/products/{productId}")
     * @Security("has_role('ROLE_USER')")
     * @param string $productId
     * @return View
     */
    public function deleteProduct(string $productId)
    {
        $product = $this->productService->delete($productId);

        return View::create($product, Response::HTTP_OK);
    }
}