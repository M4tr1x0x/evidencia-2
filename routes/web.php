<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\OrderController;

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

// Ruta principal
Route::get('/', function () {
    return view('welcome');
});

// Dashboard protegido por autenticación
Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/orders', [OrderController::class, 'index'])->name('orders.index');
    Route::get('/orders/create', [OrderController::class, 'create'])->name('orders.create');
    Route::post('/orders', [OrderController::class, 'store'])->name('orders.store');
    Route::post('/orders/{id}/upload-photo', [OrderController::class, 'uploadPhoto'])->name('orders.uploadPhoto');
    Route::get('/orders/archived', [OrderController::class, 'archived'])->name('orders.archived');
    Route::post('/orders/{order}/restore', [OrderController::class, 'restore'])->name('orders.restore');
    Route::get('/orders/{id}/edit', [OrderController::class, 'edit'])->name('orders.edit');
    Route::put('/orders/{id}', [OrderController::class, 'update'])->name('orders.update');
    Route::delete('/orders/{id}', [OrderController::class, 'destroy'])->name('orders.delete');

    // Rutas para el controlador de usuarios
    Route::resource('users', UserController::class)->except(['show']);
});



// Autenticación
require __DIR__.'/auth.php';
