@extends('layouts.app')

@section('content')
<div class="container mx-auto p-6" x-data="{ modalAgregarAbierto: false }">
    <h1 class="text-2xl font-bold mb-4">Lista de Categorías</h1>

    <!-- 🔥 Botón para abrir el modal de agregar categoría (se ubica arriba de la tabla) -->
    <div class="mb-4 flex justify-start">
        <button @click="modalAgregarAbierto = true" class="bg-blue-500 hover:bg-blue-600 text-white font-bold py-2 px-4 rounded">
            ➕ Agregar Categoría
        </button>
    </div>

    <!-- Modal de agregar categoría -->
    @include('categorias.create-modal')

    <!--Buscador-->
    <form method="GET" action="{{ route('categoria.index') }}" class="mb-4">
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

    <!--Tabla de categorías-->
    <table class="table-auto w-full mt-4 border-collapse border border-gray-300">
        <thead>
            <tr class="bg-gray-200">
                <th class="border border-gray-300 px-4 py-2">Nombre</th>
                <th class="border border-gray-300 px-4 py-2">Descripción</th>
                <th class="border border-gray-300 px-4 py-2">Imagen</th>
                <th class="border border-gray-300 px-4 py-2">Editar</th>
                <th class="border border-gray-300 px-4 py-2">Eliminar</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($categorias as $categoria)
                <tr class="text-center">
                    <td class="border border-gray-300 px-4 py-2">{{ $categoria->nombre }}</td>
                    <td class="border border-gray-300 px-4 py-2">{{ $categoria->descripcion }}</td>
                    <td class="border border-gray-300 px-4 py-2">
                        @if ($categoria->imagen)
                            <img src="{{ asset('storage/' . $categoria->imagen) }}" width="50">
                        @else
                            Sin imagen
                        @endif
                    </td>
                    <td class="border border-gray-300 px-4 py-2" x-data="{ abierto: false }">
                        @include('categorias.edit', ['categoria' => $categoria])
                    </td>
                    <td class="border border-gray-300 px-4 py-2">
                        <form action="{{ route('categoria.destroy', $categoria->id) }}" method="POST" onsubmit="return confirm('¿Eliminar esta categoría?');">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="bg-red-600 hover:bg-red-700 text-black font-bold py-2 px-4 rounded-lg shadow-md transition">Eliminar</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>

    <!--Paginación-->
    <div class="mt-4">
        {{ $categorias->appends(['search' => request()->query('search')])->links() }}
    </div>
</div>

@endsection

