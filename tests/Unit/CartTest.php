<?php

namespace Tests\Unit;

use JB\Shop\Cart;
use JB\Shop\Money;
use PHPUnit\Framework\TestCase;

class CartTest extends TestCase
{
    use createsProduct;

    /**
     * @test
     */
    public function addProductTest()
    {

        $chair = $this->makeProduct('Chair', 100, 0, 21.00);
        $table = $this->makeProduct('Table', 200, 0, 21.00);
        $cart = new Cart();
        $cart->addProduct($chair)
            ->addProduct($table);
        $products = [$chair, $table];

        $this->assertEquals($products, $cart->getProducts());
    }

    /**
     * @test
     */
    public function removeProductTest()
    {
        $chair = $this->makeProduct('Chair', 100, 0, 21.00);
        $table = $this->makeProduct('Table', 200, 0, 21.00);
        $cart = new Cart();

        $cart->addProduct($chair)
            ->addProduct($table);

        $this->assertEquals([$chair], $cart->removeProduct($table)->getProducts());
    }

    /**
     * @test
     */
    public function calculationsTest()
    {
        $chair = $this->makeProduct('Chair', 100, 0, 10.00);
        $table = $this->makeProduct('Table', 200, 0, 20.00);
        $cart = new Cart();
        $cart->addProduct($chair)
            ->addProduct($table);

        //sub total = 100+200
        //vat total = 10 + 40
        //total = 300 + 50
        $this->assertEquals(new Money(300, 0), $cart->getSubtotal());
        $this->assertEquals(new Money(50, 0), $cart->getVatAmount());
        $this->assertEquals(new Money(350, 0), $cart->getTotal());
    }
}