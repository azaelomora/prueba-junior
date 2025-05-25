@extends('layouts.app')

@section('content')
<div class="max-w-md mx-auto bg-white p-6 rounded-lg shadow-md">
    <h2 class="text-center text-2xl font-bold mb-4">Registro de Usuario</h2>

    <form method="POST" action="{{ route('register.store') }}">
        @csrf
        <input type="text" name="nombre" class="w-full border rounded p-2" placeholder="Nombre" required>
        <input type="email" name="email" class="w-full border rounded p-2 mt-4" placeholder="Correo" required>
        <input type="password" name="password" class="w-full border rounded p-2 mt-4" placeholder="Contraseña" required>
        <button type="submit" class="bg-green-600 text-white py-2 px-4 rounded w-full mt-4 hover:bg-green-700">
            Registrarse
        </button>
    </form>

    <p class="mt-4 text-center">
        ¿Ya tienes cuenta? <a href="{{ route('login') }}" class="text-blue-500">Inicia sesión aquí</a>
    </p>
</div>
@endsection
