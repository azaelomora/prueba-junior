<?php


namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CategoriaRequest extends FormRequest
{
    /**
     * Determina si el usuario está autorizado a hacer esta solicitud.
     */
    public function authorize(): bool
    {
        return true; // Permite ejecutar la validación
    }

    public function rules(): array
    {
        return [
            'nombre' => 'required|string|max:100',
            'descripcion' => 'nullable|string',
            'imagen' => 'nullable|image|max:2048', // Máx. 2MB
        ];
    }
}
