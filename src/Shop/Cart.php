<?php

namespace JB\Shop;

use JB\Contracts\CartInterface;
use JB\Contracts\MoneyInterface;
use JB\Contracts\ProductInterface;

class Cart implements CartInterface
{
    use ConvertsMoney;
    /**
     * @var array
     */
    private $products;

    /**
     * @param ProductInterface $product
     * @return CartInterface
     */
    public function addProduct(ProductInterface $product): CartInterface
    {
        $this->products[] = $product;

        return $this;
    }

    /**
     * @param ProductInterface $product
     * @return Cart
     */
    public function removeProduct(ProductInterface $product): CartInterface
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

    /**
     * @return MoneyInterface
     */
    public function getSubtotal(): MoneyInterface
    {
        $subTotal = (float)0.00;

        foreach ($this->products as $product) {
            $subTotal = $subTotal + $this->MoneyToFloat($product->getPrice());
        }

        return $this->FloatToMoney($subTotal);
    }

    /**
     * @return MoneyInterface
     */
    public function getVatAmount(): MoneyInterface
    {
        $vat_amount = (float)0.00;
        foreach ($this->products as $product) {
            $vat_amount = $vat_amount +
                ($this->MoneyToFloat($product->getPrice()) * $product->getVatRate()) / 100;
        }

        return $this->FloatToMoney($vat_amount);
    }

    /**
     * @return MoneyInterface
     */
    public function getTotal(): MoneyInterface
    {
        $total = $this->MoneyToFloat($this->getSubtotal())
            + $this->MoneyToFloat($this->getVatAmount());

        return $this->FloatToMoney($total);
    }
}