@extends('layouts.app')

@section('content')
<div class="max-w-md mx-auto bg-yellow-100 border-4 border-red-400 shadow-lg rounded-xl p-6 mt-10">
    <h2 class="text-3xl font-pokemon text-red-600 mb-6 text-center">Perfil de Usuario</h2>

    @if (session('mensaje'))
        <div class="bg-green-100 border border-green-300 text-green-900 px-4 py-3 rounded mb-4 text-center shadow">
            {{ session('mensaje') }}
        </div>
    @endif

    <!-- Formulario de actualización -->
    <form action="{{ route('usuario.actualizar') }}" method="POST" class="space-y-5">
        @csrf
        <div>
            <label class="block font-semibold text-gray-700">Nombre</label>
            <input type="text" name="nombre" value="{{ $usuario->Nombre }}" class="w-full border-2 border-gray-300 rounded px-3 py-2">
        </div>

        <div>
            <label class="block font-semibold text-gray-700">Nueva Contraseña</label>
            <input type="password" name="password" class="w-full border-2 border-gray-300 rounded px-3 py-2" placeholder="Dejar en blanco para no cambiar">
        </div>

        <button type="submit" class="w-full bg-green-500 hover:bg-green-600 text-white font-pokemon py-2 rounded-full transition">Guardar Cambios</button>
    </form>

    <!-- Borrar cuenta -->
    <form action="{{ route('usuario.borrar') }}" method="POST" class="mt-6" onsubmit="return confirm('¿Estás seguro de que deseas eliminar tu cuenta?');">
        @csrf
        <button type="submit" class="w-full bg-red-500 hover:bg-red-600 text-white font-pokemon py-2 rounded-full transition">Borrar Cuenta</button>
    </form>

    <!-- Cerrar sesión -->
    <form action="{{ route('logout') }}" method="POST" class="mt-4">
        @csrf
        <button type="submit" class="w-full bg-blue-600 hover:bg-blue-700 text-white font-pokemon py-2 rounded-full transition">Cerrar Sesión</button>
    </form>
</div>
@endsection
