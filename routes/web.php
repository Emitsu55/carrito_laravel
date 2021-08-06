<?php

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
//Rutas Get
Route::get('/', 'App\Http\Controllers\PagesController@shop')->name('shop');
Route::get('/carrito', 'App\Http\Controllers\PagesController@cart')->name('cart');
Route::get('/cart-checkout','App\Http\Controllers\CartController@cart')->name('cart.checkout');
//Rutas post
Route::post('/cart-add',    'App\Http\Controllers\CartController@add')->name('cart.add');
Route::post('/cart-clear',  'App\Http\Controllers\CartController@clear')->name('cart.clear');
Route::post('/cart-removeitem',  'App\Http\Controllers\CartController@removeitem')->name('cart.removeitem');

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');

require __DIR__.'/auth.php';

// Auth::routes();
