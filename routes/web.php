<?php

use App\Http\Controllers\UserController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\WelcomeController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\OrderController;
use App\Models\Product;
use Illuminate\Support\Facades\Route;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Auth\Middleware\EnsureEmailIsVerified;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/


Auth::routes(['verify' => true]);

Route::get('/', [WelcomeController::class, 'index']); 

Route::middleware(['auth', 'verified'])->group(function(){
    Route::middleware(['can:isAdmin'])->group(function(){
        // //warstwa products
        Route::get('/products', [ProductController::class, 'index'])->name('products.index'); 
        Route::get('/products/{product}', [ProductController::class, 'show'])->name('products.show'); 
        Route::get('/products/edit/{product}', [ProductController::class, 'edit'])->name('products.edit'); 
        Route::get('/create', [ProductController::class, 'create'])->name('products.create'); 
        Route::post('/products', [ProductController::class, 'store'])->name('products.store'); 
        Route::post('/products/{product}', [ProductController::class, 'update'])->name('products.update'); 
        Route::delete('/products/{product}', [ProductController::class, 'destroy'])->name('products.destroy');
        Route::get('/products/{product}/download', [ProductController::class, 'downloadImage'])->name('products.downloadImage');
        
        Route::get('/users/list', [UserController::class, 'index'])->name('user.list'); 
        Route::get('/users/edit/{user}', [UserController::class, 'edit'])->name('users.edit'); 
        Route::post('/users/update/{user}', [UserController::class, 'update'])->name('users.update'); 
        Route::delete('/users/{user}', [UserController::class, 'destroy']);
    }); 

    Route::get('/orders', [OrderController::class, 'index'])->name('orders.index');
    Route::post('/orders', [OrderController::class, 'store'])->name('orders.store');

    Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');  
    Route::get('/cart', [CartController::class, 'index'])->name('cart.index');  
    Route::get('/cart/test', [CartController::class, 'test'])->name('cart.test');  
    Route::post('/cart/{product}', [CartController::class, 'store'])->name('cart.store');  
    Route::delete('/cart/{product}', [CartController::class, 'destroy'])->name('cart.destroy');  
});







