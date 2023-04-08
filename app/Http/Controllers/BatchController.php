<?php

namespace App\Http\Controllers;

use App\Http\Requests\BatchRequest;
use App\Models\Batch;
use App\Models\Formula;
use App\Services\BatchService;
use App\Traits\StockLogTrait;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class BatchController extends Controller
{
    protected $batchService;
    use StockLogTrait;

    public function __construct(BatchService $batchService)
    {
        $this->batchService = $batchService;
    }

    public function createOrUpdate(BatchRequest $request)
    {
        try {
            DB::beginTransaction();
            $formula = Formula::with('details')->find($request->formula);
            $stockError = [];
            if ($formula->details){
                foreach ($formula->details as $formulaIngredients){
                   $ingredient = $formulaIngredients->ingredient;
                   if(  $ingredient->quantity >=($formulaIngredients->quantity * $request->quantity)  ){
                       $ingredient->quantity =  $ingredient->quantity - $formulaIngredients->quantity * $request->quantity;
                       $ingredient->save();

                       $data = [
                           'ingredient_id' => $ingredient->id,
                           'quantity' => $formulaIngredients->quantity * $request->quantity,
                           'price' => $ingredient->price,
                           'stock' => 0,
                           'purchase_date' => null,
                           'use_date' => now()->toDateString()
                       ];
                       $this->saveStockLog($data);

                   }else{
                       array_push($stockError,ucwords( $ingredient->name).' stock is not enough please re stock this ingredient');
                   }
                }
                if(empty($stockError)) {
                    $create = $this->batchService->create($request->all());
                    if ($create)
                        return redirect()->back()->with("success", __("Batch created successfully"));
                }
                return redirect()->back()->with("stock_error", $stockError)->withInput();

            }
            return redirect()->back()->with("success", __("Formula ingredients not found"))->withInput();
        } catch (\Exception $exception) {
            DB::rollBack();
            return redirect()->back()->with("error", $exception->getMessage())->withInput();
        }
    }

    function index()
    {

        $formulas = Formula::with('details')->get();
        $nextId = auto_increment_value('batches');
        $batch = Batch::orderBy('code', 'desc')->first();
        if ($batch) {
            $nextId = $batch->code + 1;
        }

        return view('admin.batch.create', compact('formulas', 'nextId'));
    }

    function list()
    {
        $batches = Batch::with('formula')->get();
        return view('admin.batch.list', compact('batches'));
    }
}
