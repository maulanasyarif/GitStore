<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\DiscountController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\AdminController;

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

//landing page
Route::get('/', [UserController::class, 'index'])->name('index');

Route::get('login', [AdminController::class, 'login'])->name('login');
Route::post('customLogin', [AdminController::class, 'customLogin'])->name('customLogin');

Route::prefix('admin')->as('product.')->group(function () {
        Route::get('/product', [ProductController::class, 'index'])->name('index');
        Route::post('/addProduct', [ProductController::class, 'store'])->name('store');
        Route::get('/editProduct/{products:id}', [ProductController::class, 'edit'])->name('edit');
        Route::patch('/updateProduct/{products:id}', [ProductController::class, 'update'])->name('update');
        Route::delete('/deleteProduct/{products:id}', [ProductController::class, 'destroy'])->name('delete');
    });
    
    Route::prefix('admin')->as('discount.')->group(function () {
        Route::get('/discount', [DiscountController::class, 'index'])->name('index');
        Route::post('/addDiscount', [DiscountController::class, 'store'])->name('store');
        Route::get('/editDiscount/{discounts:id}', [DiscountController::class, 'edit'])->name('edit');
        Route::patch('/updateDiscount/{discounts:id}', [DiscountController::class, 'update'])->name('update');
        Route::delete('/deleteDiscount/{discounts:id}', [DiscountController::class, 'destroy'])->name('delete');
});

Route::prefix('user')->as('user.')->group(function () {
    Route::get('/register', [UserController::class, 'register'])->name('register');
    Route::post('/processRegis', [UserController::class, 'processRegis'])->name('processRegis');
    Route::get('/login', [UserController::class, 'login'])->name('login');
    Route::post('/processLogin', [UserController::class, 'processLogin'])->name('processLogin');
    Route::get('/logout', [UserController::class, 'logout'])->name('logout');
});