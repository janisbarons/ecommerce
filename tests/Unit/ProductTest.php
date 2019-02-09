<?php

namespace Tests\Unit;

use JB\Shop\Money;
use JB\Shop\Product;
use PHPUnit\Framework\TestCase;

class ProductTest extends TestCase
{
    /**
     * @test
     * @covers \JB\Shop\Product::getName()
     * @covers \JB\Shop\Product::setName()
     */
    public function productNameTest()
    {
        $product = new Product();
        $product_name = "My test product name";

        $product->setName($product_name);

        $this->assertEquals($product_name, $product->getName());
    }

    /**
     * @test
     */
    public function productAvailabilityTest()
    {
        $product = new Product();
        $product->setAvailable(10);

        $this->assertEquals(10, $product->getAvailable());
    }

    /**
     * @test
     */
    public function productPriceTest()
    {
        $price = new Money(1, 20);
        $product = new Product();
        $product->setPrice($price);

        $this->assertEquals($price, $product->getPrice());
    }

    /**
     * @test
     */
    public function productVatRateTest()
    {
        $product = new Product();
        $product->setVatRate(21.00);

        $this->assertEquals(21.00, $product->getVatRate());
    }
}