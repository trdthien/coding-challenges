<?php

namespace App\Model;

/**
 * Class Money
 * @package App\Model
 */
class Money
{
    /**
     * @var string $currency
     */
    private $currency;

    /**
     * @var float $amount
     */
    private $amount;

    private function __construct()
    {
        // this constructor is declared as private as prevent object money from being constructed without currency or amount,
        // a money object must be created through fromCurrencyAndAmount function
        // which ensure a value object immutable
        // https://en.wikipedia.org/wiki/Value_object
    }

    /**
     * @param string $currency
     * @param int $amount
     * @return Money
     */
    public static function fromCurrencyAndAmount(string $currency, float $amount)
    {
        $money = new self();

        $money->currency = $currency;
        $money->amount = $amount;

        return $money;
    }

    /**
     * @return string
     */
    public function getCurrency()
    {
        return $this->currency;
    }

    /**
     * @return int
     */
    public function getAmount()
    {
        return $this->amount;
    }
}