<?php

namespace O21\LaravelWallet\Contracts;

interface TransactionPreparer
{
    public function prepare(Transaction $transaction): void;
}
