<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\OrderController;

// Ruta para el home utilizando el OrderController.
Route::get('/', [OrderController::class, 'home'])->name('home');

Route::get('/dashboard', function () {
    return view('dashboard');
})->name('dashboard');

Route::post('/logout', function () {
    return redirect('/'); // Redirecciona al home después del logout.
})->name('logout');

Route::resource('users', UserController::class);
Route::resource('orders', OrderController::class)->except(['show']);
Route::get('orders/archived', [OrderController::class, 'archived'])->name('orders.archived');
Route::post('orders/{id}/restore', [OrderController::class, 'restore'])->name('orders.restore');
