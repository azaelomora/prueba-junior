<div x-data="{ modalAbierto: false }">
    <!-- Botón para abrir el modal (llámalo desde `index.blade.php`) -->
    <button @click="modalAbierto = true" class="bg-yellow-500 hover:bg-yellow-600 text-black font-bold py-2 px-4 rounded">
        ✏️ Editar
    </button>

    <!-- Modal de edición con mejor diseño -->
    <div x-show="modalAbierto" x-transition.opacity.scale class="fixed inset-0 bg-opacity-50 flex justify-center items-center">
        <div class="bg-white p-6 rounded-lg shadow-lg max-w-md relative">
            <button @click="modalAbierto = false" class="text-red-500 absolute top-3 right-3 text-xl font-bold">✖</button>
            
            <h2 class="text-xl font-bold mb-4 text-center">Editar Producto</h2>

            <form id="formActualizar" action="{{ route('producto.update', $producto->id) }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')
            
                <label class="block text-gray-700 font-semibold">Nombre:</label>
                <input type="text" name="nombre" id="nombre" value="{{ $producto->nombre }}" class="border p-2 w-full rounded focus:ring focus:ring-blue-300">
            
                <label class="block text-gray-700 font-semibold mt-2">Descripción:</label>
                <textarea name="descripcion" id="descripcion" class="border p-2 w-full rounded focus:ring focus:ring-blue-300">{{ $producto->descripcion }}</textarea>
            
                <label class="block text-gray-700 font-semibold mt-2">Precio:</label>
                <input type="number" name="precio" id="precio" value="{{ $producto->precio }}" class="border p-2 w-full rounded focus:ring focus:ring-blue-300">
            
                <label class="block text-gray-700 font-semibold mt-2">Cantidad:</label>
                <input type="number" name="cantidad" id="cantidad" value="{{ $producto->cantidad }}" class="border p-2 w-full rounded focus:ring focus:ring-blue-300">
            
                <label class="block text-gray-700 font-semibold mt-2">Categoría:</label>
                <select name="categoria_id" id="categoria_id" class="border p-2 w-full rounded focus:ring focus:ring-blue-300">
                    @foreach ($categorias as $categoria)
                        <option value="{{ $categoria->id }}" {{ $producto->categoria_id == $categoria->id ? 'selected' : '' }}>
                            {{ $categoria->nombre }}
                        </option>
                    @endforeach
                </select>

                <label class="block text-gray-700 font-semibold mt-2">Imagen:</label>
                <input type="file" name="imagen" id="imagen" class="border p-2 w-full rounded">
            
                <!-- Mantener imagen actual si no se sube una nueva -->
                @if ($producto->imagen)
                    <input type="hidden" name="imagen_actual" value="{{ $producto->imagen }}">
                    <div class="mt-2">
                        <img src="{{ asset('storage/' . $producto->imagen) }}" width="100" class="rounded shadow-md">
                    </div>
                @endif

                <button type="submit" class="bg-green-500 hover:bg-green-600 text-black font-bold py-2 px-4 rounded mt-4 w-full">
                    💾 Guardar
                </button>
            </form>
            
            <script>
                document.getElementById('formActualizar').addEventListener('submit', function(event) {
                    setTimeout(() => {
                        modalAbierto = false; // 🔴 Cierra el modal automáticamente tras actualizar
                    }, 200); // Espera 200ms para que la actualización ocurra
                });
            </script>

        </div>
    </div>
</div>
