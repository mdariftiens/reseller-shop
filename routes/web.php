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


Route::middleware('auth', function (){
        Route::get('/home', [App\Http\Controllers\Backend\DashboardController::class, 'index'])->name('home');
        Route::post('/home', [App\Http\Controllers\Backend\DashboardController::class, 'store'])->name('save');
    });

Auth::routes();


Route::prefix('backend')->group(function(){
    Route::get('/', function () {
        return view('welcome');
    })->name('backend.home');

    Route::resource('collection', App\Http\Controllers\Backend\CollectionController::class);
    Route::resource('category', App\Http\Controllers\Backend\CategoryController::class);
    Route::resource('product', App\Http\Controllers\Backend\ProductController::class);

    Route::resource('order', App\Http\Controllers\Backend\OrderController::class);
    Route::post('order/note/{order}', [App\Http\Controllers\Backend\OrderController::class,'storeNote'])->name('order.note');
    Route::put('order/change-status/{order}', [App\Http\Controllers\Backend\OrderController::class,'changeStatus'])->name('order.changeStatus');

    Route::resource('shop-setting', App\Http\Controllers\Backend\ShopSettingController::class);

});
