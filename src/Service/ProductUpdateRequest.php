<?php

namespace App\Service;

/**
 * Class ProductUpdateRequest
 * @package App\Service
 */
class ProductUpdateRequest
{
    private $productId;
    private $name;
    private $category;
    private $quantity;
    private $price;
    private $sku;

    public function __construct(
        string $productId,
        string $name,
        string $sku,
        string $category = null,
        string $quantity = null,
        string $price = null
    ){
        $this->productId = $productId;
        $this->name = $name;
        $this->category = $category;
        $this->sku = $sku;
        $this->quantity = $quantity;
        $this->price = $price;
    }

    /**
     * @return mixed
     */
    public function getProductId()
    {
        return $this->productId;
    }

    /**
     * @return string
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * @return string
     */
    public function getCategory()
    {
        return $this->category;
    }

    /**
     * @return string
     */
    public function getQuantity()
    {
        return $this->quantity;
    }

    /**
     * @return string
     */
    public function getPrice()
    {
        return $this->price;
    }

    /**
     * @return string
     */
    public function getSku()
    {
        return $this->sku;
    }
}