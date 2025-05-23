<?php
namespace App\Http\Controllers;

use App\Http\Requests\UsuarioRequest;
use Illuminate\Support\Facades\Hash;
use App\Models\Usuario;
use Illuminate\Http\Request;

class UsuarioController extends Controller
{
    // Crear un usuario
    public function store(UsuarioRequest $request)
    {
        // Encripta la contraseña antes de guardarla
        $usuario = Usuario::create([
            'nombre' => $request->nombre,
            'email' => $request->email,
            'password' => Hash::make($request->password), 
        ]);

        return response()->json(['mensaje' => 'Usuario registrado', 'usuario' => $usuario], 201);
    }

    // Mostrar un usuario por ID
    public function show($id)
    {
        $usuario = Usuario::findOrFail($id);
        return response()->json($usuario);
    }

    // Actualizar un usuario
    public function update(UsuarioRequest $request, $id)
    {
        $usuario = Usuario::findOrFail($id);

        // Filtra datos y encripta contraseña solo si se está actualizando
        $datosActualizados = $request->validated();
        if ($request->has('password')) {
            $datosActualizados['password'] = Hash::make($request->password);
        }
    
        $usuario->update($datosActualizados);
        return response()->json(['mensaje' => 'Usuario actualizado', 'usuario' => $usuario]);
    }

    // Eliminar un usuario
    public function destroy($id)
    {
        Usuario::findOrFail($id)->delete();
        return response()->json(['mensaje' => 'Usuario eliminado']);
    }
}

