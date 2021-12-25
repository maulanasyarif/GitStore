<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\ShippingController;
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
Route::post('/customLoginAdmin', [AdminController::class, 'customLoginAdmin'])->name('customLoginAdmin');
Route::get('/register', [AdminController::class, 'register'])->name('register');
Route::post('/processRegis', [AdminController::class, 'processRegis'])->name('processRegis');
Route::get('/logout', [AdminController::class, 'logout'])->name('logout');

//admin after login
Route::prefix('admin')->as('admin.')->group(function () {
    Route::get('/dashboard', [AdminController::class, 'dashboard'])->name('dashboard');
    Route::post('/approveOrder', [AdminController::class, 'approveOrder'])->name('approveOrder');
    Route::delete('/destroyOrder', [AdminController::class, 'destroyOrder'])->name('destroyOrder');
});

//product
Route::prefix('admin')->as('product.')->group(function () {
    Route::get('/product', [ProductController::class, 'index'])->name('index');
    Route::post('/addProduct', [ProductController::class, 'store'])->name('store');
    Route::get('/editProduct/{products:id}', [ProductController::class, 'edit'])->name('edit');
    Route::patch('/updateProduct/{products:id}', [ProductController::class, 'update'])->name('update');
    Route::delete('/deleteProduct/{products:id}', [ProductController::class, 'destroy'])->name('delete');
});

//shipping
Route::prefix('admin')->as('shipping.')->group(function () {
    Route::get('/shipping', [ShippingController::class, 'index'])->name('index');
    Route::post('/addShipping', [ShippingController::class, 'store'])->name('store');
    Route::get('/editShipping/{shipping:id}', [ShippingController::class, 'edit'])->name('edit');
    Route::patch('/updateShipping/{shipping:id}', [ShippingController::class, 'update'])->name('update');
    Route::delete('/deleteShipping/{shipping:id}', [ShippingController::class, 'destroy'])->name('delete');
});

Route::prefix('user')->as('user.')->group(function () {
    Route::get('/register', [UserController::class, 'register'])->name('register');
    Route::post('/processRegis', [UserController::class, 'processRegis'])->name('processRegis');
    Route::get('/login', [UserController::class, 'login'])->name('login');
    Route::post('/processLogin', [UserController::class, 'processLogin'])->name('processLogin');
    Route::get('/logout', [UserController::class, 'logout'])->name('logout');

    Route::get('/dashboard', [UserController::class, 'dashboard'])->name('dashboard');
    Route::get('/buy', [UserController::class, 'buy'])->name('buy');
    Route::post('/buyProcess', [UserController::class, 'buyProcess'])->name('buyProcess');
    Route::get('/cartsBuy', [UserController::class, 'cartsBuy'])->name('cartsBuy');
    Route::post('/cartsBuyProcess', [UserController::class, 'cartsBuyProcess'])->name('cartsBuyProcess');
    Route::get('/history', [UserController::class, 'history'])->name('history');
    Route::get('/carts', [UserController::class, 'carts'])->name('carts');
    Route::post('/storeCarts', [UserController::class, 'storeCarts'])->name('storeCarts');
    Route::delete('/deleteCarts/{carts:id}', [UserController::class, 'destroyCart'])->name('deleteCarts');
});