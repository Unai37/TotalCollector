@extends('layouts.app')

@section('content')
<!-- Formulario de Actualización -->
<form action="{{ route('usuario.actualizar') }}" method="POST" class="flex flex-col gap-4 w-full max-w-md">
    @csrf
    <div>
        <label>Nombre de Usuario</label>
        <input type="text" name="nombre_usuario" value="{{ $usuario->Nombre }}" class="border w-full px-2 py-1" required>
    </div>
    <div>
        <label>Nombre</label>
        <input type="text" name="nombre" value="{{ $usuario->Nombre }}" class="border w-full px-2 py-1" required>
    </div>
    <div>
        <label>Nueva Contraseña</label>
        <input type="password" name="password" class="border w-full px-2 py-1">
    </div>

    <div class="flex gap-4 mt-4">
        <button type="submit" class="bg-pink-300 px-4 py-2 rounded">Guardar Cambios</button>
    </div>
</form>


<!-- Formulario para eliminar la cuenta -->
<form action="{{ route('usuario.borrar') }}" method="POST">
    @csrf
    <button type="submit" class="bg-pink-300 px-4 py-2 rounded mt-2">Borrar Cuenta</button>
</form>

<!-- Cerrar Sesión -->
<form action="{{ route('logout') }}" method="POST">
    @csrf
    <button type="submit" class="bg-red-400 px-4 py-2 mt-4">Cerrar Sesión</button>
</form>

@endsection
