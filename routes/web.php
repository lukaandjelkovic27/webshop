<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\ProductController;

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
    return view('home');
});

Auth::routes();

Route::get('/home', function () { return view('home'); } )->name('home');

Route::group([ 'prefix' => 'user', 'as' => 'user.', 'middleware' => ['auth']], function () {
    Route::get('/', [App\Http\Controllers\User\HomeController::class, 'index'])->name('home');
});

//ADMIN
Route::group(['prefix' => 'admin', 'as' => 'admin.', 'middleware' => ['auth']], function () {
    //HomeController
    Route::get('/', [App\Http\Controllers\Admin\HomeController::class, 'index'])->name('home');
    //ProductController
    Route::get('products', [ProductController::class, 'index'])->name('products');
    Route::get('products/{category}', [ProductController::class, 'indexCategory'])->name('category_products');
    Route::get('products/new', [ProductController::class, 'create'])->name('new-product');
    Route::post('store-product', [ProductController::class, 'store'])->name('store-product');

});


