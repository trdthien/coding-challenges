<?php

namespace App\Model;

/**
 * Class Category
 * @package App\Model
 */
class Category
{
    /**
     * @var string $id
     */
    private $id;
    /**
     * @var string $name
     */
    private $name;

    /**
     * @return string
     */
    public function getId(): string
    {
        return $this->id;
    }

    /**
     * @param string $id
     */
    public function setId(string $id)
    {
        $this->id = $id;
    }

    /**
     * @return string
     */
    public function getName(): string
    {
        return $this->name;
    }

    /**
     * @param string $name
     */
    public function setName(string $name)
    {
        $this->name = $name;
    }
}