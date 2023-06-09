<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class StockLog extends Model
{
    use HasFactory;
    protected $fillable = [
        'ingredient_id','quantity','price','stock','purchase_date','use_date'
    ];
}
