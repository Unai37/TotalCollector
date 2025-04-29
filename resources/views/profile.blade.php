@extends('layouts.app')

@section('content')
<div class="flex flex-col md:flex-row items-start p-6 gap-6">
    <!-- Icono de perfil -->
    <div>
        <svg class="w-32 h-32 border rounded-full p-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
            <path d="M12 12c2.21 0 4-1.79 4-4S14.21 4 12 4 8 5.79 8 8s1.79 4 4 4zm0 2c-2.67 0-8 1.34-8 4v2h16v-2c0-2.66-5.33-4-8-4z"/>
        </svg>
    </div>

    <!-- Formulario de usuario -->
    <form class="flex flex-col gap-4 w-full max-w-md">
        <div>
            <label>Nombre de Usuario</label>
            <input type="text" class="border w-full px-2 py-1">
        </div>
        <div>
            <label>Nombre</label>
            <input type="text" class="border w-full px-2 py-1">
        </div>
        <div>
            <label>Contraseña</label>
            <input type="password" class="border w-full px-2 py-1">
        </div>
        <div>
            <label>Email</label>
            <input type="email" class="border w-full px-2 py-1">
        </div>

        <div class="flex gap-4 mt-4">
            <button type="submit" class="bg-pink-300 px-4 py-2 rounded">Guardar Cambios</button>
            <button type="button" class="bg-pink-300 px-4 py-2 rounded">Borrar Cuenta</button>
        </div>
    </form>
</div>
@endsection
