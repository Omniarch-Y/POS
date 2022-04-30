<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\StockController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\ReceiptController;
use App\Http\Controllers\CategoryController;

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

Auth::routes();

Route::get('/home', [StockController::class, 'index'])->name('home');

// Route for stock items
Route::controller(StockController::class)->group( function (){

    Route::get('singleItem/{id}','show');
    Route::post('storeItem','store');
    Route::get('edit/{id}','edit');
    Route::put('updateItem/{id}','update');
    Route::delete('deleteStock/{id}','destroy');
    Route::get('sortList/{id}','sortItems');
    Route::get('collection','display');
    Route::get('editView','editView');
});

Route::controller(CartController::class)->group(function(){
    Route::post('storeCart','store');
    Route::post('receipt','index');
    Route::get('dailyReport','listReport');
    Route::get('anyReport','anyReport');
    Route::post('changeStatus','changeStatus');
});

Route::controller(ReceiptController::class)->group( function (){
     
    Route::get('receiptList','index');
    Route::get('anyReceipt','sortReceipt');
    Route::get('receipt/{id}','show');
    
});

Route::controller(CategoryController::class)->group( function (){
    Route::post('addCategories', 'store');
    Route::get('/itemForm','displayForm');
});