<?php

namespace App\Controller;

use App\Repository\CategoryRepositoryInterface;
use FOS\RestBundle\Controller\AbstractFOSRestController;
use FOS\RestBundle\View\View;
use Symfony\Component\HttpFoundation\Response;
use FOS\RestBundle\Controller\Annotations as Rest;

/**
 * Class CategoryController
 * @package App\Controller
 */
class CategoryController extends AbstractFOSRestController
{
    /**
     * @var CategoryRepositoryInterface
     */
    private $categoryRepository;

    /**
     * CategoryRepository constructor.
     * @param CategoryRepositoryInterface $categoryRepository
     */
    public function __construct(CategoryRepositoryInterface $categoryRepository)
    {
        $this->categoryRepository = $categoryRepository;
    }

    /**
     * Retrieves a collection of Product resource
     * @Rest\Get("/categories")
     */
    public function getProducts()
    {
        $categories = $this->categoryRepository->getAll();

        return View::create($categories, Response::HTTP_OK);
    }
}