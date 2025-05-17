@extends('layouts.app')

@section('content')
<div class="max-w-md mx-auto bg-white shadow-md rounded-lg p-6 mt-10">

    <h2 class="text-2xl font-bold mb-6 text-cyan-700 text-center">Perfil de Usuario</h2>

    {{-- Mensaje de éxito --}}
    @if (session('mensaje'))
        <div class="bg-green-100 border border-green-300 text-green-800 px-4 py-3 rounded mb-4 text-center">
            {{ session('mensaje') }}
        </div>
    @endif

    <!-- Formulario de Actualización -->
    <form action="{{ route('usuario.actualizar') }}" method="POST" class="flex flex-col gap-5">
        @csrf

        <div>
            <label class="block mb-1 font-semibold text-gray-700">Nombre</label>
            <input type="text" name="nombre" value="{{ $usuario->Nombre }}" 
                   class="border border-cyan-300 rounded-md w-full px-3 py-2 focus:outline-none focus:ring-2 focus:ring-cyan-400" required>
        </div>

        <div>
            <label class="block mb-1 font-semibold text-gray-700">Nueva Contraseña</label>
            <input type="password" name="password" 
                   class="border border-cyan-300 rounded-md w-full px-3 py-2 focus:outline-none focus:ring-2 focus:ring-cyan-400" placeholder="Dejar en blanco para no cambiar">
        </div>

        <button type="submit" 
                class="bg-green-400 hover:bg-green-500 transition-colors text-white font-semibold rounded-md py-2 mt-4">
            Guardar Cambios
        </button>
    </form>

    <!-- Formulario para eliminar la cuenta con confirmación -->
    <form action="{{ route('usuario.borrar') }}" method="POST" class="mt-6" 
          onsubmit="return confirm('¿Estás seguro de que deseas eliminar tu cuenta? Esta acción no se puede deshacer.');">
        @csrf
        <button type="submit" 
                class="w-full bg-red-400 hover:bg-red-500 transition-colors text-white font-semibold rounded-md py-2">
            Borrar Cuenta
        </button>
    </form>

    <!-- Cerrar Sesión -->
    <form action="{{ route('logout') }}" method="POST" class="mt-4">
        @csrf
        <button type="submit" 
                class="w-full bg-blue-600 hover:bg-blue-700 transition-colors text-white font-semibold rounded-md py-2">
            Cerrar Sesión
        </button>
    </form>

</div>
@endsection

