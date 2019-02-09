<?php

namespace JB\Shop;

use JB\Contracts\MoneyInterface;

class Money implements MoneyInterface
{
    /**
     * @var int
     */
    private $cents;
    /**
     * @var int
     */
    private $euros;

    /**
     * Money constructor.
     * @param int $euros
     * @param int $cents
     */
    public function __construct(int $euros, int $cents)
    {
        $this->euros = $euros;
        $this->cents = $cents;
    }

    /**
     * @param int $cents
     * @return MoneyInterface
     */
    public function setCents(int $cents): MoneyInterface
    {
        $this->cents = $cents;

        return $this;
    }

    /**
     * @return int
     */
    public function getCents(): int
    {
        return $this->cents;
    }

    /**
     * @param int $euros
     * @return MoneyInterface
     */
    public function setEuros(int $euros): MoneyInterface
    {
        $this->euros = $euros;

        return $this;
    }

    /**
     * @return int
     */
    public function getEuros(): int
    {
        return $this->euros;
    }
}