<!doctype html>
<html>
  <head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    @vite('resources/css/app.css')
  </head>
  <body class="bg-gray-100 text-gray-900">
    <nav class="p-4 bg-blue-600 text-white flex justify-between items-center">
        <!-- Botón Home alineado a la izquierda -->
        <div>
            <a href="{{ route('home') }}" class="bg-blue-500 text-white px-3 py-1 rounded hover:bg-blue-700">
                Home
            </a>
        </div>
    
        <!-- Contenedor centrado con Categorías y Productos -->
        <div class="flex-1 text-center">
            <a href="{{ route('categoria.index') }}" class="mx-4 text-lg font-semibold hover:text-gray-300">Categorías</a>
            <a href="{{ route('home') }}" class="mx-4 text-lg font-semibold hover:text-gray-300">Productos</a>
        </div>
    
        <!-- Contenedor de autenticación alineado a la derecha -->
        <div class="flex items-center">
            @auth
                <a href="{{ route('perfil.index') }}" class="mr-4">Perfil</a>
                <form method="POST" action="{{ route('logout') }}" class="inline">
                    @csrf
                    <button type="submit" class="bg-red-500 text-white px-3 py-1 rounded hover:bg-red-700">
                        Cerrar sesión
                    </button>
                </form>
            @endauth
            @guest
                <a href="{{ route('login') }}" class="bg-green-500 text-white px-3 py-1 rounded hover:bg-green-700">
                    Iniciar sesión
                </a>
            @endguest
        </div>
    </nav>



    <div class="container mx-auto mt-6">
      @yield('content') <!-- Aquí se insertarán las vistas -->
    </div>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>



  </body>
  
</html>
