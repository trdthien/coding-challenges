<?php

namespace App\Test\Model;

use App\Model\Money;
use App\Model\Price;
use PHPUnit\Framework\TestCase;

/**
 * Class PriceTest
 * @package App\Test\Model
 */
class PriceTest extends TestCase
{
    public function testCreatePrice()
    {
        $price = new Price();
        $price->setId('price-id');
        $value = Money::fromCurrencyAndAmount('CAD', 99);
        $price->setValue($value);

        $this->assertEquals('price-id', $price->getId());
        $this->assertSame($value, $price->getValue());
    }
}