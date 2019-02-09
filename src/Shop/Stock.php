<?php

namespace JB\Shop;

use JB\Contracts\ProductInterface;
use JB\Contracts\StockInterface;

class Stock implements StockInterface
{
    /**
     * @var array
     */
    private $products;

    /**
     * @param ProductInterface $product
     * @return StockInterface
     */
    public function addProduct(ProductInterface $product): StockInterface
    {
        $this->products[] = $product;

        return $this;
    }

    /**
     * @param ProductInterface $product
     * @return StockInterface
     */
    public function removeProduct(ProductInterface $product): StockInterface
    {
        //I assume that name of product is unique.
        // otherwise it could be some kind of ID to check.
        $this->products = array_filter($this->products, function (ProductInterface $p) use ($product) {
            return $p->getName() !== $product->getName();
        });
        return $this;
    }

    /**
     * @return array
     */
    public function getProducts(): array
    {
        return $this->products;
    }
}