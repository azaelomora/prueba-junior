<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Producto extends Model
{
    protected $table = 'productos'; // Nombre exacto de la tabla en la BD

    protected $fillable = [
        'nombre',
        'descripcion',
        'precio',
        'cantidad',
        'categoria_id',
        'imagen'
    ];

    public function categoria()
    {
        return $this->belongsTo(Categoria::class);
    }
}