<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\ProductController;
use App\Http\Controllers\User\IndexController;
use App\Http\Controllers\User\CartController;
use App\Http\Controllers\User\OrderController;
use App\Http\Controllers\Admin\OrderListController;

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

//GUEST
Route::get('/', function (){ return view('user.home'); })->name('home');
Route::get('/products', [IndexController::class, 'index'])->name('products');
Route::get('/products/{category}', [IndexController::class, 'indexCategory'])->name('category_products');
Route::get('/product/{product}', [IndexController::class, 'show'])->name('show_product');

//USER
Route::group([ 'prefix' => 'user', 'as' => 'user.', 'middleware' => ['auth']], function () {
    Route::get('/', [App\Http\Controllers\User\HomeController::class, 'index'])->name('home');
    Route::get('/products', [IndexController::class, 'index'])->name('products');
    Route::get('/products/{category}', [IndexController::class, 'indexCategory'])->name('category_products');
    Route::get('/product/{product}', [IndexController::class, 'show'])->name('show_product');
    //Cart Controller
    Route::get('cart', [CartController::class, 'index'])->name('index_cart');
    Route::post('cart/add-product/{product}', [CartController::class, 'addToCart'])->name('add_product');
    Route::delete('cart/delete-product/{product}', [CartController::class, 'deleteFromCart'])->name('delete_product');
    //Order Controller
    Route::get('order/history', [OrderController::class, 'ordersHistory'])->name('order.history');
    Route::post('order/new-order/{cart}', [OrderController::class, 'sendOrder'])->name('send_order');
});

//ADMIN
Route::group(['prefix' => 'admin', 'as' => 'admin.', 'middleware' => ['auth','role:admin']], function () {
    //IndexController
    Route::get('/', [App\Http\Controllers\Admin\HomeController::class, 'index'])->name('home');
    //IndexController
    Route::get('products', [ProductController::class, 'index'])->name('products');
    Route::get('products/new', [ProductController::class, 'create'])->name('new-product');
    Route::get('products/{category}', [ProductController::class, 'indexCategory'])->name('category_products');
    Route::get('product/{product}', [ProductController::class, 'show'])->name('show_product');
    Route::get('product/{product}/edit', [ProductController::class, 'edit'])->name('edit_product');
    Route::post('store-product', [ProductController::class, 'store'])->name('store-product');
    Route::put('product/{product}', [ProductController::class, 'update'])->name('update_product');
    Route::delete('product/{product}', [ProductController::class, 'destroy'])->name('delete_product');
    Route::get('productCategory/{product}/edit', [ProductController::class, 'editProductCategory'])->name('edit_productCategory');
    Route::delete('productCategory/{product}', [ProductController::class, 'destroyProductCategory'])->name('delete_productCategory');
    Route::put('productCategory{product}', [ProductController::class, 'updateProductCategory'])->name('update_productCategory');
    //OrderController
    Route::get('order/list', [OrderListController::class, 'ordersList'])->name('orders.list');

});


