<?php

use O21\LaravelWallet\Numeric;

if (! function_exists('num')) {
    /**
     * Create a new Numeric instance for safe calculations
     *
     * @param  string|float|int|\O21\LaravelWallet\Numeric  $value
     * @return \O21\LaravelWallet\Numeric
     */
    function num(string|float|int|Numeric $value): Numeric
    {
        return new Numeric($value);
    }
}

if (! function_exists('transaction')) {
    function transaction(): \O21\LaravelWallet\Transaction\Creator
    {
        return app(\O21\LaravelWallet\Transaction\Creator::class);
    }
}

if (! function_exists('deposit')) {
    function deposit(
        string|float|int|Numeric $amount,
        ?string $currency = null
    ): \O21\LaravelWallet\Transaction\Creator {
        $creator = transaction()->processor('deposit');

        if ($currency) {
            $creator->currency($currency);
        }

        return $creator->amount($amount);
    }
}

if (! function_exists('charge')) {
    function charge(
        string|float|int|Numeric $amount,
        ?string $currency = null
    ): \O21\LaravelWallet\Transaction\Creator{
        $creator = transaction()->processor('charge');

        if ($currency) {
            $creator->currency($currency);
        }

        return $creator->amount($amount);
    }
}
