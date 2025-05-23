<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Categoria;
use Carbon\Carbon;

class CategoriaSeeder extends Seeder
{
    public function run()
    {
        Categoria::create([
    'nombre' => 'Electrónica',
    'descripcion' => 'Productos electrónicos y accesorios.',
    'imagen' => 'electronica.jpg',
]);

Categoria::create([
    'nombre' => 'Ropa',
    'descripcion' => 'Vestimenta y moda para todas las edades.',
    'imagen' => 'ropa.jpg',
]);

Categoria::create([
    'nombre' => 'Hogar',
    'descripcion' => 'Artículos para el hogar y decoración.',
    'imagen' => 'hogar.jpg',
]);

Categoria::create([
    'nombre' => 'Deportes',
    'descripcion' => 'Equipamiento y ropa deportiva.',
    'imagen' => 'deportes.jpg',
]);

Categoria::create([
    'nombre' => 'Juguetes',
    'descripcion' => 'Juguetes para niños de todas las edades.',
    'imagen' => 'juguetes.jpg',
]);

Categoria::create([
    'nombre' => 'Belleza',
    'descripcion' => 'Productos de cuidado personal y belleza.',
    'imagen' => 'belleza.jpg',
]);

Categoria::create([
    'nombre' => 'Libros',
    'descripcion' => 'Libros y material educativo.',
    'imagen' => 'libros.jpg',
]);

Categoria::create([
    'nombre' => 'Alimentos',
    'descripcion' => 'Productos de alimentación y bebidas.',
    'imagen' => 'alimentos.jpg',
]);

Categoria::create([
    'nombre' => 'Jardinería',
    'descripcion' => 'Herramientas y artículos para jardín.',
    'imagen' => 'jardineria.jpg',
]);

Categoria::create([
    'nombre' => 'Muebles',
    'descripcion' => 'Mobiliario para el hogar y oficina.',
    'imagen' => 'muebles.jpg',
]);

Categoria::create([
    'nombre' => 'Automotriz',
    'descripcion' => 'Accesorios y repuestos para vehículos.',
    'imagen' => 'automotriz.jpg',
]);

Categoria::create([
    'nombre' => 'Mascotas',
    'descripcion' => 'Productos para el cuidado de mascotas.',
    'imagen' => 'mascotas.jpg',
]);

Categoria::create([
    'nombre' => 'Tecnología',
    'descripcion' => 'Gadgets y dispositivos inteligentes.',
    'imagen' => 'tecnologia.jpg',
]);

Categoria::create([
    'nombre' => 'Salud',
    'descripcion' => 'Productos para bienestar y salud.',
    'imagen' => 'salud.jpg',
]);

Categoria::create([
    'nombre' => 'Ferretería',
    'descripcion' => 'Herramientas y materiales de construcción.',
    'imagen' => 'ferreteria.jpg',
]);

$this->command->info('¡15 categorías insertadas correctamente!');
    }
}
