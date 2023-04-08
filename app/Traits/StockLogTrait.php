<?php

namespace App\Traits;

use App\Models\StockLog;

trait StockLogTrait
{

    public function saveStockLog($data): bool
    {
        StockLog::create([
            'ingredient_id' => $data['ingredient_id'],
            'quantity' => $data['quantity'],
            'price' => $data['price'],
            'stock' => $data['stock'],
            'purchase_date' => $data['purchase_date'],
            'use_date' => $data['use_date']
        ]);
        return true;
    }
}
