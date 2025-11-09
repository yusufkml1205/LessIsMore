<?php

use App\Http\Controllers\HomeController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\CheckoutController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('auth/login');
});

// Auth Routes dari Breeze
require __DIR__.'/auth.php';

// Route untuk authenticated users
Route::middleware(['auth'])->group(function () {
    Route::get('/home', [HomeController::class, 'index'])->name('home');
    
    // Products
    Route::get('/products', [ProductController::class, 'index'])->name('products.index');
    Route::get('/products/{product}', [ProductController::class, 'show'])->name('products.show');
    
    // Cart
    Route::get('/cart', [CartController::class, 'index'])->name('cart.index');
    Route::post('/cart', [CartController::class, 'store'])->name('cart.store');
    Route::put('/cart/{cartItem}', [CartController::class, 'update'])->name('cart.update');
    Route::delete('/cart/{cartItem}', [CartController::class, 'destroy'])->name('cart.destroy');
    
    // Checkout
    Route::get('/checkout', [CheckoutController::class, 'index'])->name('checkout.index');
    Route::post('/checkout/process', [CheckoutController::class, 'process'])->name('checkout.process');
});

// Admin routes
Route::middleware(['auth', 'admin'])->prefix('admin')->group(function () {
    Route::get('/dashboard', function () {
        $customersCount = \App\Models\User::where('role', 'customer')->count();
        $productsCount = \App\Models\Product::count();
        $recentCustomers = \App\Models\User::where('role', 'customer')->latest()->take(5)->get();
        
        return view('admin.dashboard', compact('customersCount', 'productsCount', 'recentCustomers'));
    })->name('admin.dashboard');
    
    Route::get('/customers', function () {
        $customers = \App\Models\User::where('role', 'customer')->get();
        return view('admin.customers', compact('customers'));
    })->name('admin.customers');
});