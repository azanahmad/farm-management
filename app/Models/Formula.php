<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Formula extends Model
{
    use HasFactory;


    protected $fillable = ['name'];

    function details(){
        return $this->hasMany(FormulaIngredient::class,'formula_id','id');
    }
}
