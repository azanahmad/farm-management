<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/login',  [\App\Http\Controllers\Auth\AuthController::class, 'login'])->name('login');
Route::post('/authenticate',  [\App\Http\Controllers\Auth\AuthController::class, 'authenticate'])->name('authenticate');

Route::group(['middleware'=> ['auth']],function() {

    Route::get('/', [\App\Http\Controllers\Auth\AuthController::class, 'index'])->name('index');
    Route::get('/dashboard', [\App\Http\Controllers\Auth\AuthController::class, 'index'])->name('dashboard');

    Route::get('/logout', [\App\Http\Controllers\Auth\AuthController::class, 'logout'])->name('logout');

    Route::prefix('ingredients/')->name('ingredients.')->group(function () {

        Route::get('create', [\App\Http\Controllers\IngredientController::class, 'index'])->name('create');
        Route::post('createOrUpdate/{id?}', [\App\Http\Controllers\IngredientController::class, 'createOrUpdate'])->name('createOrUpdate');
        Route::get('list', [\App\Http\Controllers\IngredientController::class, 'list'])->name('list');
        Route::get('edit/{id}', [\App\Http\Controllers\IngredientController::class, 'edit'])->name('edit');
        Route::get('delete',[\App\Http\Controllers\IngredientController::class, 'delete'])->name('delete');
    });

    Route::prefix('formula/')->name('formula.')->group(function () {
        Route::get('/', [\App\Http\Controllers\FormulaController::class, 'index'])->name('create');
        Route::get('/list', [\App\Http\Controllers\FormulaController::class, 'list'])->name('list');
        Route::post('/create', [\App\Http\Controllers\FormulaController::class, 'create'])->name('createOrUpdate');
    });

    Route::prefix('batch/')->name('batch.')->group(function () {
        Route::get('/', [\App\Http\Controllers\BatchController::class, 'index'])->name('create');
        Route::get('/list', [\App\Http\Controllers\BatchController::class, 'list'])->name('list');
        Route::post('/create', [\App\Http\Controllers\BatchController::class, 'createOrUpdate'])->name('createOrUpdate');
    });

    Route::prefix('stock/')->name('stock.')->group(function () {
        Route::get('/', [\App\Http\Controllers\StockController::class, 'index'])->name('list');
        Route::get('/edit/{id}', [\App\Http\Controllers\StockController::class, 'edit'])->name('edit');
        Route::get('/view/{id}', [\App\Http\Controllers\StockController::class, 'view'])->name('view');
        Route::post('/stockUpdate/{id}', [\App\Http\Controllers\StockController::class, 'update'])->name('update');
    });

    Route::prefix('users/')->name('users.')->group(function () {

        Route::get('create', [\App\Http\Controllers\UserController::class, 'user'])->name('create');
        Route::post('add', [\App\Http\Controllers\UserController::class, 'user_register'])->name('add');
        Route::get('list', [\App\Http\Controllers\UserController::class, 'user_list'])->name('list');
        Route::get('edit/{id}', [\App\Http\Controllers\UserController::class, 'user_edit'])->name('edit');
        Route::post('update/{id}/', [\App\Http\Controllers\UserController::class, 'user_update'])->name('update');
        Route::get('delete',[\App\Http\Controllers\UserController::class, 'user_delete'])->name('delete');
    });

});
