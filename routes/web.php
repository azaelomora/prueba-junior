<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CategoriaController;
    

Route::get('/', function () {
    return view('welcome');
});

require __DIR__.'/usuarios.php';
require __DIR__.'/productos.php';
require __DIR__.'/categorias.php';
