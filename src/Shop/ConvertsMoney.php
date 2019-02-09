<?php

namespace JB\Shop;

use JB\Contracts\MoneyInterface;

trait ConvertsMoney
{

    public function FloatToMoney(float $amount): MoneyInterface
    {
        $parts = explode('.', (string)$amount);
        $euros = $parts[0];
        $cents = array_key_exists(1, $parts) ? $parts[1] : 0;

        return new Money($euros, $cents);
    }

    public function MoneyToFloat(MoneyInterface $money): float
    {
        return (float)$money->getEuros() . '.' . $money->getCents();
    }
}