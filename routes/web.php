<?php

use App\Http\Controllers\HomeController;
use App\Http\Controllers\PaymentController;
use App\Http\Controllers\UserController;
use App\Http\Livewire\AllProducts;
use App\Http\Livewire\Cart;
use App\Http\Livewire\Checkout;
use App\Http\Livewire\Payment;
use App\Http\Livewire\ProductDetail;
use App\Http\Livewire\Profile;
use App\Http\Livewire\UserSettings;
use Illuminate\Support\Facades\Route;


Route::get('/', HomeController::class)->name('home');
Route::get('product-detail/{slug}', ProductDetail::class)->name('product.detail');
Route::get('products', AllProducts::class)->name('all.products');

Route::middleware('auth')->group(function() {
    Route::get('cart', Cart::class)->name('cart');
    Route::get('checkout', Checkout::class)->name('checkout');
    Route::get('user/settings', [UserController::class, 'index'])->name('user.index');

    Route::get('payment', [PaymentController::class, 'index'])->name('payment');
    Route::post('payment', [PaymentController::class, 'payment_post'])->name('payment.post');
});

require __DIR__.'/auth.php';
