<?php

namespace App\Test\Model;

use App\Model\Money;
use PHPUnit\Framework\TestCase;

class MoneyTest extends TestCase
{
    public function testCreateMoney()
    {
        $money = Money::fromCurrencyAndAmount('USD', 100);

        $this->assertInstanceOf(Money::class, $money);
        $this->assertEquals('USD', $money->getCurrency());
        $this->assertEquals(100, $money->getAmount());
    }
}