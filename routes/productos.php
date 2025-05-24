<?php

use App\Http\Controllers\ProductoController;
use Illuminate\Support\Facades\Route;

Route::get('/productos', [ProductoController::class, 'index'])->name('home'); // Mostrar todos los productos

Route::post('/productos', [ProductoController::class, 'store']); // Crear un producto
Route::get('/productos/{id}', [ProductoController::class, 'show']); // Mostrar un producto por ID
Route::put('/productos/{id}', [ProductoController::class, 'update']); // Actualizar un producto
Route::delete('/productos/{id}', [ProductoController::class, 'destroy']); // Eliminar un producto
