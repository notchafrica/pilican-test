<?php

namespace App\Traits;

use App\Models\Transaction;

trait HasTransactions
{
    public function transactions()
    {
        return $this->morphMany(Transaction::class, 'transactionable');
    }
}
