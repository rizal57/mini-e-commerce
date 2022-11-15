<?php

use App\Http\Controllers\Checkout;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ProductDetail as ControllersProductDetail;
use App\Http\Controllers\ProductsController;
use App\Http\Livewire\Cart;
use App\Http\Livewire\Home;
use App\Http\Livewire\ProductDetail;
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

Route::get('/', HomeController::class)->name('home');
Route::get('product-detail/{slug}', ProductDetail::class)->name('product.detail');
// Route::get('product-detail/{slug}', [ProductsController::class, 'show'])->name('product.show');

Route::middleware('auth')->group(function() {
    Route::get('cart', Cart::class)->name('cart');
    Route::get('checkout', Checkout::class)->name('checkout');
});

require __DIR__.'/auth.php';
