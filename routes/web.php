<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\OrderController;

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

require __DIR__.'/auth.php';

Route::resource('products', ProductController::class)->middleware(['auth']);

Route::middleware(['auth'])->group(function () {
    Route::get('/carrito', [OrderController::class, 'cart'])->name('cart.index');
    Route::post('/carrito/agregar/{product}', [OrderController::class, 'add'])->name('cart.add');
    Route::post('/carrito/remover/{id}', [OrderController::class, 'remove'])->name('cart.remove');
    Route::post('/comprar', [OrderController::class, 'checkout'])->name('cart.checkout');
});