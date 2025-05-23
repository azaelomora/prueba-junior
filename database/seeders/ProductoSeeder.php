<?php
namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Producto;
use Carbon\Carbon;

class ProductoSeeder extends Seeder
{
    public function run()
    {
        Producto::create([
            'nombre' => 'Laptop Gamer',
            'descripcion' => 'Laptop con alto rendimiento para videojuegos.',
            'precio' => 18999.99,
            'cantidad' => 15,
            'categoria_id' => 18,
            'imagen' => 'laptop_gamer.jpg',
        ]);

        Producto::create([
            'nombre' => 'Smartphone Pro',
            'descripcion' => 'Teléfono inteligente con cámara avanzada.',
            'precio' => 12999.99,
            'cantidad' => 30,
            'categoria_id' => 18,
            'imagen' => 'smartphone_pro.jpg',
        ]);

        $this->command->info('Productos insertados correctamente!');
    }
}

