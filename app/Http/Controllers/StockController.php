<?php

namespace App\Http\Controllers;

use App\Http\Requests\StockRequest;
use App\Models\Ingredient;
use App\Models\StockLog;
use App\Traits\StockLogTrait;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class StockController extends Controller
{
    use StockLogTrait;

    function index()
    {
        $stock = Ingredient::all();
        return view('admin.stock.list', compact('stock'));
    }

    function edit($id)
    {

        try {

            $stock = Ingredient::find($id);
            if ($stock)
                return view('admin.stock.update', compact('stock'));
            else
                return redirect()->route('stock.list')->with('error', 'Record not found!');

        } catch (\Exception $exception) {
            return redirect()->route('stock.list')->with('error', $exception->getMessage());
        }
    }

    function update(StockRequest $request, $id = null)
    {
        try {

            DB::beginTransaction();
            $quantity = $request->quantity;

            $ingredient = Ingredient::updateOrCreate(
                ['id' => $id]
            );

            $ingredient->price = $request->price;
            $ingredient->quantity = $request->quantity + $ingredient->quantity;
            $ingredient->save();
            $data = [
                'ingredient_id' => $ingredient->id,
                'quantity' => $quantity,
                'price' => $request->price,
                'stock' => 1,
                'purchase_date' => now()->toDateString(),
                'use_date' => null
            ];
            $this->saveStockLog($data);
            DB::commit();
            return redirect()->back()->with('success', 'Stock Updated Successfully');
        } catch (\Exception $exception) {
            DB::rollBack();
            return redirect()->back()->with('error', $exception->getMessage())->withInput();
        }
    }

    function view($id)
    {

        try {

            $stockLogs = StockLog::where('ingredient_id', $id)->get();
            if ($stockLogs)
                return view('admin.stock.view', compact('stockLogs'));
            else
                return redirect()->route('stock.list')->with('error', 'Record not found!');

        } catch (\Exception $exception) {
            return redirect()->route('stock.list')->with('error', $exception->getMessage());
        }
    }
}
