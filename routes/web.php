<?php

use App\Http\Controllers\InvoiceController;
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

Route::get('/', function () {
    return view('welcome');
});

Route::post('invoice', [InvoiceController::class, 'invoiceRegister'])->name('invoice.invoiceRegister');
Route::put('invoice/{id}/customer/{id}', [InvoiceController::class, 'updateCustomer'])->name('invoice.updateCustomer');
Route::post('invoice/{id}/product', [InvoiceController::class, 'addProduct'])->name('invoice.addProduct');
Route::delete('invoice/{id}/product', [InvoiceController::class, 'deleteProduct'])->name('invoice.deleteProduct');
