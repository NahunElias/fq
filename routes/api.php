<?php

use App\Http\Controllers\AutenticarController;
use App\Http\Controllers\CustomerController;
use App\Http\Controllers\ProductController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

/* Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
}); */
/* 
Route::get('products', [ProductController::class, 'index'])->name('product.index');
Route::post('products', [ProductController::class, 'store'])->name('product.store');
Route::get('products/{product}', [ProductController::class, 'show'])->name('product.show');
Route::put('products/{product}', [ProductController::class, 'update'])->name('product.update');
Route::delete('products/{product}', [ProductController::class, 'destroy'])->name('product.destroy'); */


Route::post('registro', [AutenticarController::class, 'registro']);
Route::post('acceso', [AutenticarController::class, 'acceso']);
Route::apiResource('products', ProductController::class);
Route::apiResource('customers', CustomerController::class);


//Route::put('products/{product}',[ProductController::class, 'update']);

Route::group(['middleware' => ['auth:sanctum']], function(){
    Route::post('cerrarsesion', [AutenticarController::class, 'cerrarsesion']);
   

});
