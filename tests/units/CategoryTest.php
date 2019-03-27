<?php

namespace App\Test\Model;

use App\Model\Category;
use PHPUnit\Framework\TestCase;

/**
 * Class CategoryTest
 * @package App\Test\Model
 */
class CategoryTest extends TestCase
{
    public function testCreateCategory()
    {
        $category = new Category();
        $category->setId($id = 'cat-id');
        $category->setName($name = 'cat-name');

        $this->assertEquals($id, $category->getId());
        $this->assertEquals($name, $category->getName());
    }
}