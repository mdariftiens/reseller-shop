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


Auth::routes();


Route::get('/', [App\Http\Controllers\Frontend\FrontEndController::class, 'index'])->name('home');
Route::get('/login', [App\Http\Controllers\Frontend\LoginController::class, 'show'])->name('login');
Route::get('/logout', [App\Http\Controllers\Frontend\LoginController::class, 'logout'])->name('logout');
Route::post('/login-verify', [App\Http\Controllers\Frontend\LoginController::class, 'verify'])->name('login-verify');

Route::get('/tracking', [App\Http\Controllers\Frontend\TrackingController::class, 'index'])->name('tracking');
Route::get('/track', [App\Http\Controllers\Frontend\TrackingController::class, 'track'])->name('track');
Route::get('/reseller', [App\Http\Controllers\Frontend\ResellerController::class, 'index'])->name('reseller');
Route::get('/register', [App\Http\Controllers\Frontend\RegisterUserController::class, 'create'])->name('register');
Route::post('/register', [App\Http\Controllers\Frontend\RegisterUserController::class, 'store'])->name('register.store');

Route::middleware('auth')->prefix('backend')->group(function(){

    Route::view('/','welcome')->name('backend.home');

    Route::post('/home', [App\Http\Controllers\Backend\DashboardController::class, 'store'])->name('save');


    Route::resource('inactive-customer', App\Http\Controllers\Backend\InactiveUserController::class);
    Route::get('inactive-customer/{id}/unverify', [App\Http\Controllers\Backend\InactiveUserController::class,'unverify'])->name('inactive-customer.unverify');

    Route::get('new-customer/{id}/verify', [App\Http\Controllers\Backend\NewCustomerController::class,'verify'])->name('new-customer.verify');
    Route::resource('new-customer', App\Http\Controllers\Backend\NewCustomerController::class);

    Route::resource('collection', App\Http\Controllers\Backend\CollectionController::class);
    Route::resource('category', App\Http\Controllers\Backend\CategoryController::class);
    Route::resource('product', App\Http\Controllers\Backend\ProductController::class);

    Route::resource('order', App\Http\Controllers\Backend\OrderController::class);
    Route::get('order/{order}/pdf', [App\Http\Controllers\Backend\OrderController::class,'pdfInvoice'])->name('pdf-invoice');
    Route::post('order/note/{order}', [App\Http\Controllers\Backend\OrderController::class,'storeNote'])->name('order.note');
    Route::put('order/change-status/{order}', [App\Http\Controllers\Backend\OrderController::class,'changeStatus'])->name('order.changeStatus');

    Route::resource('shop-setting', App\Http\Controllers\Backend\ShopSettingController::class);


});



