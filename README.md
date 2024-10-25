# Evidencia 2 - Desarrollo de Aplicación Web

## Descripción
Este proyecto es una aplicación web desarrollada con Laravel 8. Permite gestionar órdenes y usuarios mediante CRUD, incluyendo búsqueda por número de factura y manejo de roles para los usuarios.

## Requisitos Previos
- PHP >= 7.4
- Composer
- MySQL o cualquier base de datos compatible
- Laravel 8

## Funcionalidades

### Usuarios
- Listado de usuarios registrados (activos e inactivos).
- Creación de usuarios con la opción de asignar roles.
- Edición de datos y cambio de estado de los usuarios.
- Desactivación de usuarios.

### Órdenes
- Listado de todas las órdenes, ordenadas de la más reciente a la más antigua.
- Creación de nuevas órdenes con la posibilidad de subir evidencia.
- Actualización de las órdenes y su estado.
- Eliminación lógica de órdenes.
- Listado de órdenes archivadas con opción de restauración.

### Búsqueda de Órdenes
- Formulario de búsqueda por número de factura.
- Muestra evidencia de la orden entregada o el proceso en curso.

## Rutas Principales

```php
Route::get('/', [OrderController::class, 'home'])->name('home');
Route::get('/dashboard', function () {
    return view('dashboard');
})->name('dashboard');
Route::post('/logout', function () {
    return redirect('/');
})->name('logout');

Route::resource('users', UserController::class);
Route::resource('orders', OrderController::class)->except(['show']);
Route::get('orders/archived', [OrderController::class, 'archived'])->name('orders.archived');
Route::post('orders/{id}/restore', [OrderController::class, 'restore'])->name('orders.restore');
