<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Batch extends Model
{
    use HasFactory,HasUuids;

    protected $fillable = ['name','quantity','formula_id','code'];

    function formula(){
        return $this->belongsTo(Formula::class,'formula_id','id');
    }
}
