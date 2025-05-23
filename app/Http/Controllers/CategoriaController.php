<?php

namespace App\Http\Controllers;

use App\Http\Requests\CategoriaRequest;
use App\Models\Categoria;
use Illuminate\Http\Request;

class CategoriaController extends Controller
{
    //Mostrar todas las categorías.
    public function index(Request $request)
    {
        $search = $request->query('search');

        $categorias = Categoria::where('nombre', 'like', "%{$search}%")
            ->orWhere('descripcion', 'like', "%{$search}%")
            ->paginate(10);

        return view('categorias.index', compact('categorias', 'search'));
    }

     //Crear una nueva categoría.
    public function store(CategoriaRequest $request)
    {
        $validated = $request->validated();

        // Subir imagen si existe
        if ($request->hasFile('imagen')) {
            $validated['imagen'] = $request->file('imagen')->store('categorias', 'public');
        }

        // Crear la categoría
        $categoria = Categoria::create($validated);

        // Redirigir al listado después de crear la categoría
        return redirect()->route('categoria.index')->with('mensaje', 'Categoría creada exitosamente.');
    }


    //Mostrar una categoría por ID.
    public function show($id)
    {
        $categoria = Categoria::findOrFail($id);
        return view('categorias.show', compact('categoria'));
    }

    
     //Actualizar una categoría.
    public function update(CategoriaRequest $request, Categoria $categoria)
    {
        $validated = $request->validated();

        if ($request->hasFile('imagen')) {
            if ($categoria->imagen) {
                Storage::disk('public')->delete($categoria->imagen);
            }

            $validated['imagen'] = $request->file('imagen')->store('categorias', 'public');
        } else {
            $validated['imagen'] = $categoria->imagen;
        }

        $categoria->update($validated);
        return redirect()->route('categoria.index')->with('mensaje', 'Categoría actualizada exitosamente.');
    }


    // Eliminar una categoría.
    public function destroy($id)
    {
        $categoria = Categoria::findOrFail($id);
        $categoria->delete();

        session()->flash('mensaje', 'Categoría eliminada exitosamente');
        return redirect()->route('categoria.index');
    }
}
