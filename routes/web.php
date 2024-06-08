<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\OrderListController;
use App\Http\Controllers\CartController;


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

Route::get('orders/misOrdenes', [OrderController::class, 'myOrders'])->middleware('auth')->name('orders.misOrdenes');


Route::get('/contacto', function () {
    return view('contacto');
});
Route::get('/orders/gracias', function () {
    return view('/orders/gracias');
});
Route::get('/donde', function () {
    return view('donde');
});
Route::get('/sobre', function () {
    return view('sobre');
});

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});


Route::resource('products', ProductController::class);
Route::resource('orders', OrderController::class);


Route::post('/orders/store', [OrderController::class, 'store'])->middleware('auth')->name('orders.store');
Route::get('/orders/gracias/{id}', [OrderController::class, 'gracias'])->middleware('auth')->name('orders.gracias');


//aqui abajo tenia GET por si acaso da error miralo.
Route::get('/cart/add', [OrderController::class, 'add'])->name('add');
Route::get('/cart/checkout', [OrderController::class, 'checkout'])->name('checkout');


Route::post('/contacto', [OrderController::class, 'storeContact'])->name('contacto');

require __DIR__.'/auth.php';
