<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return redirect('/productos');
});


Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');


require __DIR__.'/profile.php';
require __DIR__.'/auth.php';
require __DIR__.'/categorias.php';
require __DIR__.'/productos.php';
