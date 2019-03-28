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
     * @var \DateTime $created_at
     */
    private $created_at;
    /**
     * @var \DateTime $updated_at
     */
    private $updated_at;

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