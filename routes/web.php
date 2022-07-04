<?php

require 'admin.php';
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Site\CategoryController;
use App\Http\Controllers\Site\CheckoutController;
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

// Route::get('/', function () {
//     return view('welcome');
// });

//Route::view('/admin','admin.dashboard.index');




Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');


Route::view('/','site.pages.homepage');


Route::get('/category/{slug}', [Site\CategoryController::class,'show'])->name('category.show');

Route::get('/product/{slug}', [Site\ProductController::class,'show'])->name('product.show');

Route::post('/product/add/cart', [Site\ProductController::class,'addToCart'])->name('product.add.cart');

Route::get('/cart', [Site\ProductController::class,'getCart'])->name('checkout.cart');

Route::get('/cart/item/{id}/remove', [Site\ProductController::class,'removeItem'])->name('checkout.cart.remove');

Route::get('/cart/clear', [Site\ProductController::class,'learCart'])->name('checkout.cart.clear');

Route::group(['middleware' => ['auth']], function () {
    Route::get('/checkout', [Site\CheckoutController::class,'getCheckout'])->name('checkout.index');
    Route::post('/checkout/order', [Site\CheckoutController::class,'placeOrder'])->name('checkout.place.order');
});
