<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProductoRequest;
use App\Models\Producto;
use Illuminate\Http\Request;

class ProductoController extends Controller
{
    /**
     * Mostrar todos los productos.
     */
    public function index()
    {
        $productos = Producto::all();
        return response()->json($productos);
    }

    /**
     * Crear un nuevo producto.
     */
    public function store(ProductoRequest $request)
    {
        $producto = Producto::create($request->validated());
        return response()->json(['mensaje' => 'Producto creado', 'producto' => $producto], 201);
    }

    /**
     * Mostrar un producto por ID.
     */
    public function show($id)
    {
        $producto = Producto::findOrFail($id);
        return response()->json($producto);
    }

    /**
     * Actualizar un producto.
     */
    public function update(ProductoRequest $request, $id)
    {
        $producto = Producto::findOrFail($id);
        $producto->update($request->validated());

        return response()->json(['mensaje' => 'Producto actualizado', 'producto' => $producto]);
    }

    /**
     * Eliminar un producto.
     */
    public function destroy($id)
    {
        Producto::findOrFail($id)->delete();
        return response()->json(['mensaje' => 'Producto eliminado']);
    }
}
