<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Total Collector</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
</head>
<body class="bg-white">

    <!-- Barra superior fija -->
    <header class="flex items-center justify-between px-4 py-2 bg-cyan-100 shadow fixed top-0 left-0 right-0 z-50">
        <div class="flex items-center gap-4">
            <button id="menu-toggle" class="text-2xl">&#9776;</button>
            <a href="{{ route('home') }}" class="text-xl font-bold">TOTAL COLLECTOR</a>
        </div>
        <a href="{{ route('profile') }}" class="flex items-center gap-2">
            mi perfil
            <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path d="M12 12c2.21 0 4-1.79 4-4S14.21 4 12 4 8 5.79 8 8s1.79 4 4 4zm0 2c-2.67 0-8 1.34-8 4v2h16v-2c0-2.66-5.33-4-8-4z"/>
            </svg>
        </a>
    </header>

    <!-- Menú lateral -->
    <aside id="sidebar" class="absolute left-0 top-16 w-64 bg-green-100 p-4 shadow hidden z-50">
        <ul>
            <li><a href="{{ route('home') }}" class="block py-1">Inicio</a></li>
            <li><strong>Colecciones</strong>
                <ul class="ml-4 list-disc">
                    <li>1</li>
                    <li>2</li>
                </ul>
            </li>
            <li>Favoritos</li>
            <li>Foros</li>
        </ul>
    </aside>

    <!-- Contenido principal -->
    <main class="flex-1 p-6 pt-20"> <!-- Agregar un padding-top de 20 para mayor separación -->
        @yield('content')
    </main>

    <script>
        document.getElementById('menu-toggle').addEventListener('click', function () {
            document.getElementById('sidebar').classList.toggle('hidden');
        });
    </script>
</body>
</html>
