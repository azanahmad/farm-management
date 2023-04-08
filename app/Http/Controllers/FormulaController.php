<?php

namespace App\Http\Controllers;

use App\Http\Requests\FormulaRequest;
use App\Models\Formula;
use App\Models\Ingredient;
use App\Services\FormulaService;

class FormulaController extends Controller
{
    protected $formulaService;
    public function __construct(FormulaService $formulaService)
    {
        $this->formulaService = $formulaService;
    }
    public function index() {
        $ingredients = Ingredient::all();
        return view('admin.formula.create',compact('ingredients'));
    }
    public function create(FormulaRequest $request){
        try{
            $create = $this->formulaService->create($request->all());
            if($create){
                return redirect()->back()->with("success",__("Formula saved successfully"));
            }
        }catch (\Exception $exception){
            return redirect()->back()->with("error",$exception->getMessage());
        }
    }
    function list(){
        $formulas = Formula::with('details')->get();
        return view('admin.formula.list',compact('formulas'));
    }
}
