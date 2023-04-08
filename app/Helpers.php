<?php

use Illuminate\Support\Facades\DB;

if (!function_exists('auto_increment_value')) {

    function auto_increment_value($tableName)
    {
        $statement = DB::select("SHOW TABLE STATUS LIKE '".$tableName."'");
        return $statement[0]->Auto_increment;
    }
}


