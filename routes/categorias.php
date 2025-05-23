<?php
/**
use App\Http\Controllers\CategoriaController;
use Illuminate\Support\Facades\Route;

Route::get('/categorias', [CategoriaController::class, 'index']);
Route::post('/categorias', [CategoriaController::class, 'store']);
Route::get('/categorias/{id}', [CategoriaController::class, 'show']);
Route::put('/categorias/{id}', [CategoriaController::class, 'update']);
Route::delete('/categorias/{id}', [CategoriaController::class, 'destroy']);
*/
use App\Http\Controllers\CategoriaController;
use Illuminate\Support\Facades\Route;

Route::get('/categoria', [CategoriaController::class, 'index'])->name('categoria.index');
Route::get('/categoria/{id}', [CategoriaController::class, 'show'])->name('categoria.show');
Route::post('/categoria', [CategoriaController::class, 'store'])->name('categoria.store');
Route::get('/categoria/{id}/edit', [CategoriaController::class, 'edit'])->name('categoria.edit');
Route::put('/categoria/{id}', [CategoriaController::class, 'update'])->name('categoria.update');
Route::delete('/categoria/{id}', [CategoriaController::class, 'destroy'])->name('categoria.destroy');

