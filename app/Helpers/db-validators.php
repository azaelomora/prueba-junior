<?php

namespace App\Helpers;

use App\Models\Usuario;

class ValidacionesHelper
{
    public static function emailExiste($email)
    {
        return Usuario::where('email', $email)->exists();
    }
}
