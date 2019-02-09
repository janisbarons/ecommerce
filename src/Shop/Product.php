<?php

namespace JB\Shop;

use JB\Contracts\MoneyInterface;
use JB\Contracts\ProductInterface;

class Product implements ProductInterface
{
    /**
     * @var String
     */
    private $name;
    /**
     * @var Integer
     */
    private $available;
    /**
     * @var MoneyInterface
     */
    private $price;
    /**
     * @var Float
     */
    private $vat_rate;

    /**
     * @param string $name
     * @return self
     */
    public function setName(string $name): ProductInterface
    {
        $this->name = $name;

        return $this;
    }

    /**
     * @return string
     */
    public function getName(): string
    {
        return $this->name;
    }

    /**
     * @param int $available
     * @return ProductInterface
     */
    public function setAvailable(int $available): ProductInterface
    {
        $this->available = $available;

        return $this;
    }

    /**
     * @return int
     */
    public function getAvailable(): int
    {
        return $this->available;
    }

    /**
     * @param MoneyInterface $price
     * @return ProductInterface
     */
    public function setPrice(MoneyInterface $price): ProductInterface
    {
        $this->price = $price;

        return $this;
    }

    /**
     * @return MoneyInterface
     */
    public function getPrice(): MoneyInterface
    {
        return $this->price;
    }

    /**
     * @param float $vat
     * @return ProductInterface
     */
    public function setVatRate(float $vat): ProductInterface
    {
        $this->vat_rate = $vat;

        return $this;
    }

    /**
     * @return float
     */
    public function getVatRate(): float
    {
        return $this->vat_rate;
    }
}