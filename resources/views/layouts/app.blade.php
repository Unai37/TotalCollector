<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Total Collector</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
    <link rel="icon" href="{{ asset('icono.ico') }}" type="image/x-icon">
</head>
<body class="bg-white">

    <!-- Barra superior (ya no es fija para que desaparezca al hacer scroll) -->
    <header class="flex items-center justify-between px-4 py-3 bg-white shadow-md w-full z-10">
        <div class="flex items-center gap-4">
            <button id="menu-toggle" class="text-2xl text-gray-700 hover:text-red-500">&#9776;</button>
            <a href="{{ route('home') }}" class="text-xl font-bold text-gray-800 hover:text-red-500">TOTAL COLLECTOR</a>
        </div>
        <a href="{{ route('profile') }}" class="flex items-center gap-2 text-gray-700 hover:text-red-500">
            mi perfil
            <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path d="M12 12c2.21 0 4-1.79 4-4S14.21 4 12 4 8 5.79 8 8s1.79 4 4 4zm0 2c-2.67 0-8 1.34-8 4v2h16v-2c0-2.66-5.33-4-8-4z"/>
            </svg>
        </a>
    </header>

    <!-- Menú lateral actualizado -->
    <aside id="sidebar" class="absolute left-0 top-15 w-64 bg-gray-100 border-r border-gray-300 p-4 shadow hidden z-50">
        <ul class="space-y-2">
            <li><a href="{{ route('home') }}" class="block text-gray-700 hover:text-red-500 font-semibold">Inicio</a></li>
            <li>
                <span class="block text-gray-700 font-semibold"><a href="{{ route('colecciones') }}" class="hover:text-red-500">Colecciones</a></span>
                <ul class="ml-4 list-disc text-sm text-gray-600 space-y-1">
                    <li><a href="{{ route('colecciones.base-set') }}" class="hover:text-red-500">Base Set</a></li>
                    <li><a href="{{ route('colecciones.champions-path') }}" class="hover:text-red-500">Champion's Path</a></li>
                    <li><a href="{{ route('colecciones.scarlet-violet') }}" class="hover:text-red-500">Scarlet & Violet</a></li>
                </ul>
            </li>
            <li><a href="{{ route('favoritos') }}" class="block text-gray-700 hover:text-red-500 font-semibold">Favoritos</a></li>
            <li><a href="{{ route('foro') }}" class="block text-gray-700 hover:text-red-500 font-semibold">Foro</a></li>
        </ul>
    </aside>

    <!-- Contenido principal -->
    <main class="px-6 py-8">
        @yield('content')
    </main>

    <script>
        document.getElementById('menu-toggle').addEventListener('click', function () {
            document.getElementById('sidebar').classList.toggle('hidden');
        });
    </script>

</body>
</html>
