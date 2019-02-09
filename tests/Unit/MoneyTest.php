<?php

namespace Tests\Unit;

use JB\Shop\Money;
use PHPUnit\Framework\TestCase;

class MoneyTest extends TestCase {
    /**
     * @test
     */
    public function moneyInitialTest() {

        $money = new Money(1,20);

        $this->assertEquals($money->getEuros(),1);
        $this->assertEquals($money->getCents(),20);
    }
    /**
     * @test
     */
    public function eurosValueTest() {

        $money = new Money(1,20);
        $money->setEuros(30);

        $this->assertEquals($money->getEuros(),30);
    }

    /**
     * @test
     */
    public function centsValuesTest() {

        $money = new Money(1,20);
        $money->setCents(45);

        $this->assertEquals($money->getCents(),45);
    }
}