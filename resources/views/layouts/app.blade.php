<!doctype html>
<html>
  <head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    @vite('resources/css/app.css')
  </head>
  <body class="bg-gray-100 text-gray-900">
    <nav class="p-4 bg-blue-600 text-white">
      <a href="{{ route('categoria.index') }}" class="mr-4">Categorías</a>
    </nav>

    <div class="container mx-auto mt-6">
      @yield('content') <!-- Aquí se insertarán las vistas -->
    </div>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>



  </body>
  
</html>
