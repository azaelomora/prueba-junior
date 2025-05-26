<?php

use App\Http\Controllers\ProductoController;
use Illuminate\Support\Facades\Route;

Route::get('/productos', [ProductoController::class, 'index'])->name('home'); // Mostrar todos los productos
Route::get('/producto', [ProductoController::class, 'index'])->name('producto.index');
Route::get('/producto/{id}', [ProductoController::class, 'show'])->name('producto.show');
Route::post('/producto', [ProductoController::class, 'store'])->name('producto.store');
Route::get('/producto/{id}/edit', [ProductoController::class, 'edit'])->name('producto.edit');
Route::put('/producto/{id}', [ProductoController::class, 'update'])->name('producto.update');
Route::delete('/producto/{id}', [ProductoController::class, 'destroy'])->name('producto.destroy');
