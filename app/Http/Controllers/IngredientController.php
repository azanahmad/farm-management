<?php

namespace App\Http\Controllers;

use App\Http\Requests\RawMaterialRequest;
use App\Models\Ingredient;
use App\Traits\StockLogTrait;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class IngredientController extends Controller
{
    use StockLogTrait;

    function index()
    {
        $nextId = auto_increment_value('ingredients');
        $ingredient = Ingredient::orderBy('code','desc')->first();
        if($ingredient){
         $nextId =  $ingredient->code + 1;
        }

        return view('admin.ingredients.create',compact('nextId'));
    }

    function createOrUpdate(RawMaterialRequest $request, $id = null)
    {
        try {

            DB::beginTransaction();
            $flag = true;
            $quantity = $request->quantity;

            $ingredient = Ingredient::updateOrCreate(
                ['id' => $id]
            );

            if (isset($ingredient->id) && ($ingredient->price == $request->price && $ingredient->quantity == $request->quantity)) {
                $flag = false;
            }

            if(isset($ingredient->id) && ($ingredient->quantity != $request->quantity)){
                $quantity = $request->quantity -$ingredient->quantity;
            }

            $ingredient->code = $request->code;
            $ingredient->name = $request->name;
            $ingredient->description = $request->description;
            $ingredient->price = $request->price;
            $ingredient->quantity = $request->quantity;
            $ingredient->quantity_alert = $request->quantity_alert;
            $ingredient->save();

            if ($flag) {
                $data = [
                    'ingredient_id' => $ingredient->id,
                    'quantity' => $quantity,
                    'price' => $request->price,
                    'stock' => 1,
                    'purchase_date' => now()->toDateString(),
                    'use_date' => null
                ];
                $this->saveStockLog($data);
            }
            DB::commit();
            return redirect()->back()->with('success', 'Ingredient Added/Updated Successfully');
        } catch (\Exception $exception) {
            DB::rollBack();
            return redirect()->back()->with('error', $exception->getMessage())->withInput();
        }
    }

    function list()
    {
        $ingredients = Ingredient::get();
        return view('admin.ingredients.index', compact('ingredients'));
    }

    function edit($id)
    {
        try {

            $ingredient = Ingredient::find($id);
            if ($ingredient)
                return view('admin.ingredients.create', compact('ingredient'));
            else
                return redirect()->route('ingredients.list')->with('error', 'Record not found!');

        } catch (\Exception $exception) {
            return redirect()->route('ingredients.list')->with('error', $exception->getMessage());
        }
    }

    function delete(Request $request)
    {

        try {
            Ingredient::where('id', $request->id)->delete();
            return redirect()->back()->with('success', 'Ingredient deleted successfully');
        } catch (\Exception $exception) {
            return redirect()->route('ingredients.list')->with('error', $exception->getMessage());
        }

    }
}
