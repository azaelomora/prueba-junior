<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProductoRequest;
use App\Models\Producto;
use App\Models\Categoria;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ProductoController extends Controller
{
    // Mostrar todos los productos
    public function index(Request $request)
    {
        $search = $request->query('search');

        $productos = Producto::where('nombre', 'like', "%{$search}%")
            ->orWhere('descripcion', 'like', "%{$search}%")
            ->paginate(10);

            // Obtener todas las categorías disponibles
        $categorias = Categoria::all();
        
        return view('productos.index', compact('productos', 'search', 'categorias'));
    }

    // Crear un nuevo producto
    public function store(ProductoRequest $request)
    {
        $validated = $request->validated();

        // Subir imagen si existe
        if ($request->hasFile('imagen')) {
            $validated['imagen'] = $request->file('imagen')->store('productos', 'public');
        }

        // Crear el producto
        $producto = Producto::create($validated);

        // Redirigir al listado después de crear el producto
        return redirect()->route('producto.index')->with('mensaje', 'Producto creado exitosamente.');
    }

    // Mostrar un producto por ID
    public function show($id)
    {
        $producto = Producto::findOrFail($id);
        return view('productos.show', compact('producto'));
    }

    // Actualizar un producto
    public function update(ProductoRequest $request, $id) // 👈 Cambiamos el parámetro a `$id`
{
    $producto = Producto::findOrFail($id); // 👈 Buscamos la instancia existente en la base de datos

    $validated = $request->validated();

    if ($request->hasFile('imagen')) {
        if ($producto->imagen) {
            Storage::disk('public')->delete($producto->imagen);
        }
        $validated['imagen'] = $request->file('imagen')->store('productos', 'public');
    } else {
        $validated['imagen'] = $producto->imagen;
    }

    $producto->update($validated); // 👈 Ahora debería actualizar correctamente

    return redirect()->route('producto.index')->with('mensaje', 'Producto actualizado exitosamente.');
}


    // Eliminar un producto
    public function destroy($id)
    {
        $producto = Producto::findOrFail($id);
        $producto->delete();

        session()->flash('mensaje', 'Producto eliminado exitosamente');
        return redirect()->route('producto.index');
    }
}
