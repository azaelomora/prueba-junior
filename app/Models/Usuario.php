<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Usuario extends Model
{
    use HasFactory;

    protected $table = 'usuarios';

    protected $fillable = [
        'nombre',
        'email',
        'password',
        'fecha_registro'
    ];

    protected $hidden = [
        'password',
    ];

    protected $casts = [
        'fecha_registro' => 'datetime',
    ];
}
