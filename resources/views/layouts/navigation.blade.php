<nav class="p-4 bg-blue-600 text-white flex justify-between items-center">
    <!-- Botón Home alineado a la izquierda -->
    <div>
        <a href="{{ route('home') }}" class="bg-blue-500 text-white px-3 py-1 rounded hover:bg-blue-700">
            Home
        </a>
    </div>

    <!-- Contenedor de Categorías y Productos -->
    <div class="flex-1 text-center">
        <a href="{{ route('categoria.index') }}" class="mx-4 text-lg font-semibold hover:text-gray-300">Categorías</a>
        <a href="{{ route('home') }}" class="mx-4 text-lg font-semibold hover:text-gray-300">Productos</a>
    </div>

    <!-- Contenedor de autenticación -->
    <div class="flex items-center">
        @auth
            <!-- Menú desplegable -->
            <x-dropdown align="right" width="48">
                <x-slot name="trigger">
                    <button class="inline-flex items-center px-3 py-2 border border-transparent text-sm leading-4 font-medium rounded-md text-white bg-blue-500 hover:bg-blue-700 focus:outline-none transition ease-in-out duration-150">
                        <div>{{ Auth::user()->name }}</div>
                        <div class="ml-2">
                            <svg class="fill-current h-4 w-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                                <path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd" />
                            </svg>
                        </div>
                    </button>
                </x-slot>

                <x-slot name="content">
                    <x-dropdown-link :href="route('profile.edit')">
                        {{ __('Perfil') }}
                    </x-dropdown-link>


                    <!-- Opción para cerrar sesión -->
                    <form method="POST" action="{{ route('logout') }}">
                        @csrf
                        <x-dropdown-link :href="route('logout')"
                                onclick="event.preventDefault();
                                            this.closest('form').submit();">
                            {{ __('Cerrar sesión') }}
                        </x-dropdown-link>
                    </form>
                </x-slot>
            </x-dropdown>
        @endauth

        @guest
            <!-- Botón de inicio de sesión -->
            <a href="{{ route('login') }}" class="bg-green-500 text-white px-3 py-1 rounded hover:bg-green-700 mr-2">
                Iniciar sesión
            </a>

            <!-- Botón de registro -->
            <a href="{{ route('register') }}" class="bg-yellow-500 text-white px-3 py-1 rounded hover:bg-yellow-700">
                Registrarse
            </a>
        @endguest
    </div>
</nav>
