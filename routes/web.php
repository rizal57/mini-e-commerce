<?php

use App\Http\Controllers\Checkout;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\UserController;
use App\Http\Livewire\Cart;
use App\Http\Livewire\ProductDetail;
use App\Http\Livewire\Profile;
use App\Http\Livewire\UserSettings;
use Illuminate\Support\Facades\Route;


Route::get('/', HomeController::class)->name('home');
Route::get('product-detail/{slug}', ProductDetail::class)->name('product.detail');
// Route::get('product-detail/{slug}', [ProductsController::class, 'show'])->name('product.show');

Route::middleware('auth')->group(function() {
    Route::get('cart', Cart::class)->name('cart');
    Route::get('checkout', Checkout::class)->name('checkout');
    Route::get('user/settings', [UserController::class, 'index'])->name('user.index');
});

require __DIR__.'/auth.php';
