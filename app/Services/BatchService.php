<?php

namespace App\Services;


use App\Models\Batch;
use Illuminate\Support\Facades\DB;

class BatchService
{

    function create($request)
    {
        try {
            Batch::create([
//              'name' => $request['name'],
                'code' => $request['code'],
                'formula_id' => $request['formula'],
                'quantity' => $request['quantity']
            ]);

            DB::commit();
            return true;
        } catch (\Exception $exception) {
            DB::rollBack();
            throw new \Exception($exception->getMessage());
        }
    }
}
