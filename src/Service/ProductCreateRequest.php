<?php

namespace App\Service;


class ProductCreateRequest
{
    private $name;
    private $category;
    private $quantity;
    private $price;
    private $sku;

    public function __construct(
        string $name,
        string $sku,
        string $category = null,
        string $quantity = null,
        string $price = null
    ){
        $this->name = $name;
        $this->category = $category;
        $this->sku = $sku;
        $this->quantity = $quantity;
        $this->price = $price;
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
     * @return mixed
     */
    public function getPrice()
    {
        return $this->price;
    }

    /**
     * @return mixed
     */
    public function getSku()
    {
        return $this->sku;
    }
}