<?php

namespace Tests\Unit;

use JB\Shop\Stock;
use PHPUnit\Framework\TestCase;

class StockTest extends TestCase
{
    use createsProduct;

    /**
     * @test
     */
    public function addProductTest()
    {
        $stock = new Stock();

        $product = $this->makeProduct('Car', 10000, 0, 21.0);
        $stock->addProduct($product);

        $this->assertEquals([$product], $stock->getProducts());
    }

    /**
     * @test
     */
    public function removeProductTest()
    {
        $stock = new Stock();
        $product = $this->makeProduct('Car', 10000, 0, 21.0);

        $stock->addProduct($product);

        $this->assertEquals([], $stock->removeProduct($product)->getProducts());
    }
}