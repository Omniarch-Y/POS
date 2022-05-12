<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\StockController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\ReceiptController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\UserController;

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

Route::get('/welcome', function () {
    return view('welcome');
})->name('welcome');

Auth::routes();

Route::get('/home', [StockController::class, 'index'])->name('home')->middleware('auth');

// Route for stock items
Route::controller(StockController::class)->middleware('isAdmin')->group( function (){

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

Route::controller(UserController::class)->group( function (){
    Route::get('viewUsers','index');
    Route::get('editView','editView');
    Route::get('editUser/{id}','edit');
    Route::put('updateUser/{id}','update');
    Route::delete('deleteUser/{id}','destroy');
    Route::post('updatePass','updatePassword')->name('updatePass');
    Route::post('registerUser','store')->name('registerUser');
});