<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FormulaIngredient extends Model
{
    use HasFactory;
    protected $fillable = ['formula_id','ingredient_id','quantity'];

    public function ingredient()
    {
        return $this->belongsTo(Ingredient::class,'ingredient_id','id');
    }
}
