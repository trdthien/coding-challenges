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
        $product->setSku($sku = '12345');
        $prices[] = (new Price())->setValue(
            Money::fromCurrencyAndAmount('USD', 19)
        );

        $product->setPrices($prices);

        $this->assertEquals($id, $product->getId());
        $this->assertEquals($name, $product->getName());
        $this->assertEquals($sku, $product->getSku());
        $this->assertEquals($prices, $product->getPrices());
    }
}