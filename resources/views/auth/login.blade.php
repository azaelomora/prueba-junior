@extends('layouts.app')

@section('content')
<div class="max-w-md mx-auto bg-white p-6 rounded-lg shadow-md">
    <h2 class="text-center text-2xl font-bold mb-4">Iniciar sesión</h2>

    <form method="POST" action="{{ route('authenticate') }}">
        @csrf
        <input type="email" name="email" class="w-full border rounded p-2" placeholder="Correo" required>
        <input type="password" name="password" class="w-full border rounded p-2 mt-4" placeholder="Contraseña" required>
        <button type="submit" class="bg-blue-600 text-white py-2 px-4 rounded w-full mt-4 hover:bg-blue-700">
            Iniciar sesión
        </button>
    </form>

    <p class="mt-4 text-center">
        ¿No tienes cuenta? <a href="{{ route('register') }}" class="text-blue-500">Regístrate aquí</a>
    </p>
</div>
@endsection
