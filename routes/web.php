<?php

use App\Http\Controllers\categoryController;
use App\Http\Controllers\customerController;
use App\Http\Controllers\invoiceController;
use App\Http\Controllers\orderController;
use App\Http\Controllers\productController;
use App\Http\Controllers\reportController;
use App\Http\Livewire\StockProduct;
use Illuminate\Support\Facades\Auth;
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

    Route::get('/dashboard', [orderController::class, 'index']);

    Route::get('/stockProduct', [productController::class, 'index']);
    Route::get('/stockProduct/editDataStock/{id}', [productController::class, 'edit']);
    Route::get('/stockProduct/addDataStock', [productController::class, 'create']);
    Route::post('/stockProduct/submitAddDataStock', [productController::class, 'store']);
    Route::get('/stockProduct/deleteDataStock/{id}', [productController::class, 'destroy'])->name('delete');
    Route::post('/updateStock', [productController::class, 'update']);
    Route::get('/stockProduct/searchProduct', [productController::class, 'search'])->name('search');

    Route::get('/addCategory', [categoryController::class, 'create']);
    Route::post('/addCategory/submitAddCategoy', [categoryController::class, 'store']);
    Route::get('/addCategory/editCategory/{id}', [categoryController::class, 'edit']);
    Route::post('/addCategory/submitEditCategoy', [categoryController::class, 'update']);
    Route::get('/addCategory/deleteDataCategory/{id}', [categoryController::class, 'destroy']);

    Route::get('/listOrder', [invoiceController::class, 'index']);
    Route::get('/listOrder/detailOrder/{id}', [invoiceController::class, 'edit']);
    Route::post('/listOrder/updateInvoice', [invoiceController::class, 'update']);
    Route::get('/listOrder/search', [invoiceController::class, 'search']);
    Route::get('/listOrder/deleteListOrder/{id}', [invoiceController::class, 'destroy']);
    Route::get('/listOrder/deleteMenuInvoice/{id}/{invoice_id}', [invoiceController::class, 'deleteMenuInvoice']);

    Route::get('/customer', [customerController::class, 'index']);
    Route::post('/customer/addCustomer', [customerController::class, 'store']);
    Route::get('/customer/editCustomer/{id}', [customerController::class, 'edit']);
    Route::post('/customer/updateCustomer', [customerController::class, 'update']);
    Route::get('/customer/deleteCustomer/{id}', [customerController::class, 'destroy']);


    Route::get('/rulesUser', function () {
        return view('settings.user');
    });
    Route::get('/addUser', function () {
        return view('settings.addUser');
    });
    Route::get('/manageUser', function () {
        return view('settings.manageUser');
    });

Route::get('/out', function () {
    Auth::logout();
    return view('welcome');
});


