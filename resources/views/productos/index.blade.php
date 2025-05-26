@extends('layouts.app')

@section('content')
<div class="container mx-auto p-6" x-data="{ modalAgregarAbierto: false }">
    <h1 class="text-2xl font-bold mb-4">Lista de Productos</h1>

    @auth
    <!-- Agregar producto -->
    <div class="mb-4 flex justify-start">
        <button @click="modalAgregarAbierto = true" class="bg-blue-500 hover:bg-blue-600 text-white font-bold py-2 px-4 rounded">
            ➕ Agregar Producto
        </button>
    </div>
    @endauth

    <!-- Modal de agregar producto -->
    @include('productos.create-modal')

    <!-- Buscador -->
    <form method="GET" action="{{ route('producto.index') }}" class="mb-4">
        <input type="text" name="search" placeholder="Buscar..." value="{{ request()->query('search') }}" class="border px-4 py-2">
        <button type="submit" class="bg-blue-500 text-white px-4 py-2">Buscar</button>
    </form>

    @if(session()->has('mensaje'))
        <script>
            window.onload = function() {
                Swal.fire({
                    title: '✅ Éxito',
                    text: "{{ session('mensaje') }}",
                    icon: 'success',
                    confirmButtonColor: '#4CAF50',
                    confirmButtonText: 'OK'
                });
            };
        </script>
    @endif

    <!-- Tabla de productos -->
    <table class="table-auto w-full mt-4 border-collapse border border-gray-300">
        <thead>
            <tr class="bg-gray-200">
                <th class="border border-gray-300 px-4 py-2">Nombre</th>
                <th class="border border-gray-300 px-4 py-2">Descripción</th>
                <th class="border border-gray-300 px-4 py-2">Precio</th>
                <th class="border border-gray-300 px-4 py-2">Cantidad</th>
                <th class="border border-gray-300 px-4 py-2">Categoría</th>
                <th class="border border-gray-300 px-4 py-2">Imagen</th>
                @auth
                <th class="border border-gray-300 px-4 py-2">Editar</th>
                <th class="border border-gray-300 px-4 py-2">Eliminar</th>
                @endauth
            </tr>
        </thead>
        <tbody>
            @foreach ($productos as $producto)
                <tr class="text-center">
                    <td class="border border-gray-300 px-4 py-2">{{ $producto->nombre }}</td>
                    <td class="border border-gray-300 px-4 py-2">{{ $producto->descripcion }}</td>
                    <td class="border border-gray-300 px-4 py-2">${{ number_format($producto->precio, 2) }}</td>
                    <td class="border border-gray-300 px-4 py-2">{{ $producto->cantidad }}</td>
                    <td class="border border-gray-300 px-4 py-2">{{ $producto->categoria->nombre }}</td>
                    <td class="border border-gray-300 px-4 py-2">
                        @if ($producto->imagen)
                            <img src="{{ asset('storage/' . $producto->imagen) }}" width="50">
                        @else
                            Sin imagen
                        @endif
                    </td>
                    @auth
                    <td class="border border-gray-300 px-4 py-2">
                        @include('productos.edit', ['producto' => $producto])
                    </td>
                    <td class="border border-gray-300 px-4 py-2">
                        <form action="{{ route('producto.destroy', $producto->id) }}" method="POST" onsubmit="return confirm('¿Eliminar este producto?');">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="bg-red-600 hover:bg-red-700 text-black font-bold py-2 px-4 rounded-lg shadow-md transition">Eliminar</button>
                        </form>
                    </td>
                    @endauth
                </tr>
            @endforeach
        </tbody>
    </table>

    <!-- Paginación -->
    <div class="mt-4">
        {{ $productos->appends(['search' => request()->query('search')])->links() }}
    </div>
</div>
@endsection

