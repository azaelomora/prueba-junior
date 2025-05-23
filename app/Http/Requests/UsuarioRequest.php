<?php

namespace App\Http\Requests;
use App\Helpers\ValidacionesHelper;
use Illuminate\Foundation\Http\FormRequest;

class UsuarioRequest extends FormRequest
{
    public function authorize()
    {
        return true; // Permitir el acceso a la validación
    }

    public function rules()
    {
        return [
            'nombre' => 'required|string|max:255',
            'email' => [
                'required', 'email', function ($attribute, $value, $fail) {
                    if (ValidacionesHelper::emailExiste($value)) {
                        $fail("El correo ya está registrado.");
                    }
                }
            ],
            'password' => 'required|min:8',
        ];
    }

    public function messages()
    {
        return [
            'nombre.required' => 'El nombre es obligatorio.',
            'email.required' => 'El correo electrónico es obligatorio.',
            'email.unique' => 'El correo ya está en uso.',
            'password.min' => 'La contraseña debe tener al menos 8 caracteres.',
        ];
    }
}
