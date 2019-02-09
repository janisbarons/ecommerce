<?php

namespace Tests\Unit;

use JB\Shop\Money;
use JB\Shop\Product;

trait createsProduct
{

    private function makeProduct($name, $euros, $cents, $vat)
    {
        return (new Product())->setName($name)
            ->setPrice(new Money($euros, $cents))
            ->setVatRate($vat)
            ->setAvailable(10);
    }
}