<?php
namespace App\Services;


use App\Models\Formula;
use App\Models\FormulaIngredient;
use App\Models\Ingredient;
use Illuminate\Support\Facades\DB;

class FormulaService{

    function create($request){
        try{
            DB::beginTransaction();

            $formula =  Formula::create([
                'name' => $request['formula_name'],
                ]);

            foreach ($request['formula_quantity'] as $ingredient=>$quantity) {
                if($quantity > 0) {
                    FormulaIngredient::create([
                        'quantity' => $quantity,
                        'formula_id' => $formula->id,
                        'ingredient_id' => $ingredient,
                    ]);
                }
            }

            DB::commit();
            return true;
        }catch (\Exception $exception){
            DB::rollBack();
            throw new \Exception($exception->getMessage());
        }
    }
}
