<?php

use App\Http\Controllers\UserController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\WelcomeController;
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

    // Route::resource('products', ProductController::class); //dont work with post methods
        // //warstwa products
        Route::get('/products', [ProductController::class, 'index'])->name('products.index'); 
        Route::get('/products/{product}', [ProductController::class, 'show'])->name('products.show'); 
        Route::get('/products/edit/{product}', [ProductController::class, 'edit'])->name('products.edit'); 

        Route::get('/create', [ProductController::class, 'create'])->name('products.create'); 

        Route::post('/products', [ProductController::class, 'store'])->name('products.store'); 
        Route::post('/products/{product}', [ProductController::class, 'update'])->name('products.update'); 
        Route::delete('/products/{product}', [ProductController::class, 'destroy'])->name('products.destroy');
        
            //middleware auth daje nam weryfikacje czy user jest zalogowany, żeby moc wyswietlic liste
        Route::get('/users/list', [UserController::class, 'index']); 
        Route::delete('/users/{user}', [UserController::class, 'destroy']);
    }); 
    Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');  
});


// //warstwa products
// Route::get('/products', [ProductController::class, 'index'])->name('products.index')->middleware('auth'); 
// Route::get('/products/{product}', [ProductController::class, 'show'])->name('products.show')->middleware('auth'); 
// Route::get('/products/edit/{product}', [ProductController::class, 'edit'])->name('products.edit')->middleware('auth'); 

// Route::get('/create', [ProductController::class, 'create'])->name('products.create')->middleware('auth'); 
// // Route::get('/products/create2', [ProductController::class, 'create2'])->name('products.create2')->middleware('auth'); 
Route::get('/test1', [ProductController::class, 'test1'])->name('products.test1')->middleware('auth'); 

// Route::post('/products', [ProductController::class, 'store'])->name('products.store')->middleware('auth'); 
// Route::post('/products/{product}', [ProductController::class, 'update'])->name('products.update')->middleware('auth'); 
// Route::delete('/products/{product}', [ProductController::class, 'destroy'])->name('products.destroy')->middleware('auth');





