<?php

namespace App\Test\Model;

use App\Model\Category;
use App\Model\Money;
use App\Model\Price;
use App\Model\Product;
use PHPUnit\Framework\TestCase;

/**
 * Class ProductTest
 * @package App\Test\Model
 */
class ProductTest extends TestCase
{
    public function testCreateProduct()
    {
        $product = new Product();

        $product->setId($id = 'product-id');
        $product->setName($name = 'product-name');
        $product->setCategories(
            $cats = [
                (new Category())->setId('cat-1')
            ]
        );

        $product->setSku($sku = '12345');
        $product->setPrice(
            $price = (new Price())->setValue(
                Money::fromCurrencyAndAmount('USD', 19)
            )
        );

        $this->assertEquals($id, $product->getId());
        $this->assertEquals($name, $product->getName());
        $this->assertEquals($cats, $product->getCategories());
        $this->assertEquals($sku, $product->getSku());
        $this->assertEquals($price, $product->getPrice());
    }
}