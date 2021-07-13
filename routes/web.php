<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\ProductController;
use App\Http\Controllers\Admin\CategoryController;

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
    Route::get('products/new', [ProductController::class, 'create'])->name('new-product');
    Route::get('products/{category}', [ProductController::class, 'indexCategory'])->name('category_products');
    Route::get('product/{product}', [ProductController::class, 'show'])->name('show_product');
    Route::get('product/{product}/edit', [ProductController::class, 'edit'])->name('edit_product');
    Route::post('store-product', [ProductController::class, 'store'])->name('store-product');
    Route::put('product/{product}', [ProductController::class, 'update'])->name('update_product');
    Route::delete('product/{product}', [ProductController::class, 'destroy'])->name('delete_product');
    Route::get('productCategory/{id}/edit', [ProductController::class, 'editProductCategory'])->name('edit_productCategory');
});


