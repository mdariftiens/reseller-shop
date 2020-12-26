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

Route::get('/', function () {
    return view('welcome');
});

Route::middleware('auth',
    function (){
        Route::get('/home', [App\Http\Controllers\Backend\DashboardController::class, 'index'])->name('home');
        Route::post('/home', [App\Http\Controllers\Backend\DashboardController::class, 'store'])->name('save');
        Route::get('/test', function (){

        });

    });

Auth::routes();

Route::resource('collection', App\Http\Controllers\Backend\CollectionController::class);
Route::resource('category', App\Http\Controllers\Backend\CategoryController::class);
Route::resource('product', App\Http\Controllers\Backend\ProductController::class);
