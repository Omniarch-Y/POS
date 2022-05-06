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
    Route::post('storeItem','store')->middleware('isAdmin');
    Route::get('edit/{id}','edit')->middleware('isAdmin');
    Route::put('updateItem/{id}','update')->middleware('isAdmin');
    Route::delete('deleteStock/{id}','destroy')->middleware('isAdmin');
    Route::get('sortList/{id}','sortItems');
    Route::get('collection','display')->middleware('isAdmin');
    Route::get('editView','editView')->middleware('isAdmin');
});

Route::controller(CartController::class)->group(function(){
    Route::post('storeCart','store')->middleware('isCasher');
    Route::post('receipt','index')->middleware('isCasher');;
    Route::get('dailyReport','listReport')->middleware('isAdmin');;
    Route::get('anyReport','anyReport')->middleware('isAdmin');;
    Route::post('changeStatus','changeStatus');
    Route::get('returnToStock/{id}','takeBack');

});

Route::controller(ReceiptController::class)->group( function (){
     
    Route::get('receiptList','index');
    Route::get('anyReceipt','sortReceipt');
    Route::get('receipt/{id}','show');
    
});

Route::controller(CategoryController::class)->middleware('isAdmin')->group( function (){
    Route::post('addCategories', 'store');
});