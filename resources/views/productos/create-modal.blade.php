<!-- Modal de agregar producto -->
<div x-show="modalAgregarAbierto" x-transition.opacity.scale class="fixed inset-0 bg-opacity-50 flex justify-center items-center z-50">
    <div class="bg-white p-6 rounded-lg shadow-lg max-w-md relative">
        <button @click="modalAgregarAbierto = false" class="text-red-500 absolute top-3 right-3 text-xl font-bold">✖</button>

        <h2 class="text-xl font-bold mb-4 text-center">Agregar Producto</h2>

        <form id="formAgregar" action="{{ route('producto.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
        
            <label class="block text-gray-700 font-semibold">Nombre:</label>
            <input type="text" name="nombre" id="nombre" class="border p-2 w-full rounded focus:ring focus:ring-blue-300">
        
            <label class="block text-gray-700 font-semibold mt-2">Descripción:</label>
            <textarea name="descripcion" id="descripcion" class="border p-2 w-full rounded focus:ring focus:ring-blue-300"></textarea>
        
            <label class="block text-gray-700 font-semibold mt-2">Precio:</label>
            <input type="number" name="precio" id="precio" class="border p-2 w-full rounded focus:ring focus:ring-blue-300">
        
            <label class="block text-gray-700 font-semibold mt-2">Cantidad:</label>
            <input type="number" name="cantidad" id="cantidad" class="border p-2 w-full rounded focus:ring focus:ring-blue-300">
        
            <label class="block text-gray-700 font-semibold mt-2">Categoría:</label>
            <select name="categoria_id" id="categoria_id" class="border p-2 w-full rounded focus:ring focus:ring-blue-300">
                @foreach ($categorias as $categoria)
                    <option value="{{ $categoria->id }}">{{ $categoria->nombre }}</option>
                @endforeach
            </select>

            <label class="block text-gray-700 font-semibold mt-2">Imagen:</label>
            <input type="file" name="imagen" id="imagen" class="border p-2 w-full rounded">
        
            <button type="submit" class="bg-green-500 hover:bg-green-600 text-black font-bold py-2 px-4 rounded mt-4 w-full">
                💾 Guardar
            </button>
        </form>
    </div>
</div>
