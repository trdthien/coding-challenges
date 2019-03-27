<?php

namespace App\Model;

/**
 * Class Price
 * @package App\Model
 */
class Price {
    /**
     * @var string $id
     */
    private $id;
    /**
     * @var Money $value
     */
    private $value;

    /**
     * @return string
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @param string $id
     */
    public function setId($id)
    {
        $this->id = $id;
    }

    /**
     * @return Money
     */
    public function getValue()
    {
        return $this->value;
    }

    /**
     * @param Money $value
     */
    public function setValue($value)
    {
        $this->value = $value;
    }
}