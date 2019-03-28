<?php

namespace App\Model;

use App\Model\Price;

/**
 * Class Product
 * @package App\Model
 */
class Product {
    /**
     * @var string $id
     */
    private $id;
    /**
     * @var string $name
     */
    private $name;
    /**
     * @var array $categories
     */
    private $categories;
    /**
     * @var string $sku
     */
    private $sku;
    /**
     * @var $price[]
     */
    private $prices;
    /**
     * @var int $quantity
     */
    private $quantity;
    /**
     * @var \DateTime $created_at
     */
    private $created_at;
    /**
     * @var \DateTime $updated_at
     */
    private $updated_at;

    /**
     * @param string $id
     */
    public function setId(string $id)
    {
        $this->id = $id;
    }

    public function getId()
    {
        return $this->id;
    }

    /**
     * @return mixed
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * @param mixed $name
     */
    public function setName($name)
    {
        $this->name = $name;
    }

    /**
     * @return mixed
     */
    public function getCategories()
    {
        return $this->categories;
    }

    /**
     * @param array $categories
     */
    public function setCategories(array $categories)
    {
        $this->categories[] = $categories;
    }

    /**
     * @param Category $category
     */
    public function setCategory(Category $category)
    {
        $this->categories[] = $category;
    }

    /**
     * @return mixed
     */
    public function getSku()
    {
        return $this->sku;
    }

    /**
     * @param mixed $sku
     */
    public function setSku($sku)
    {
        $this->sku = $sku;
    }

    /**
     * @return mixed
     */
    public function getPrices()
    {
        return $this->prices;
    }

    /**
     * @param mixed $prices
     */
    public function setPrices($prices)
    {
        $this->prices = $prices;
    }

    /**
     * @param mixed $price
     */
    public function setPrice($price)
    {
        $this->prices[] = $price;
    }

    /**
     * @return mixed
     */
    public function getQuantity()
    {
        return $this->quantity;
    }

    /**
     * @param mixed $quantity
     */
    public function setQuantity($quantity)
    {
        $this->quantity = $quantity;
    }

    /**
     * @return \DateTime
     */
    public function getCreatedAt(): \DateTime
    {
        return $this->created_at;
    }

    /**
     * @param \DateTime $created_at
     */
    public function setCreatedAt(\DateTime $created_at)
    {
        $this->created_at = $created_at;
    }

    /**
     * @return \DateTime
     */
    public function getUpdatedAt(): \DateTime
    {
        return $this->updated_at;
    }

    /**
     * @param \DateTime $updated_at
     */
    public function setUpdatedAt(\DateTime $updated_at)
    {
        $this->updated_at = $updated_at;
    }
}