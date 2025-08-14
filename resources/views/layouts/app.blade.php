<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sistema de Juzgado</title>
    @vite(['resources/css/app.css', 'resources/js/app.js']) {{-- Laravel 12 con Vite --}}
    <style>
        body {
            margin: 0;
            font-family: 'Segoe UI', sans-serif;
        }

        .app-bar {
            background-color: #8B1D3D; /* rojo vino */
            color: white;
            text-align: center;
            padding: 10px;
            font-size: 16px;
            font-weight: 500;
        }

        .separator {
            height: 4px;
            background-color: #007BFF; /* línea azul */
        }

        .menu-bar {
            background-color: #E6D1AD; /* beige */
            display: flex;
            justify-content: center;
            gap: 20px;
            padding: 20px 0;
        }

        .menu-button {
            background-color: #21584F; /* verde oscuro */
            color: white;
            border-radius: 15px;
            border: none;
            padding: 12px 20px;
            cursor: pointer;
            box-shadow: 4px 4px 6px rgba(0, 0, 0, 0.2);
            transition: transform 0.2s;
        }

        .menu-button:hover {
            transform: translateY(-2px);
        }
    </style>
</head>
<body>

    <div class="app-bar">
        SISTEMA DE JUZGADO CIVILES Y FAMILIARES
    </div>

    <div class="menu-bar">
         <a href="{{ route('juzgados.index') }}" class="menu-button">INFORMES</a>
        <a href="{{ route('seguimiento_juzgados.index') }}" class="menu-button">SEGUIMIENTOS JUZGADOS</a>
        <a href="{{ route('trabajo_pendiente.index') }}" class="menu-button">TRABAJO PENDIENTE</a>
        <a href="{{ route('juzgados.index') }}" class="menu-button">LIBRO DE GOBIERNO</a>
        <a href="{{ route('juzgados.index') }}" class="menu-button">JUZGADOS</a>
        <a href="{{ route('visitadurias.index') }}" class="menu-button">VISITADURIAS</a>
    </div>

    {{-- Aquí se incluirá el contenido dinámico de las vistas --}}
    <div class="container">
        @yield('content')
    </div>

</body>
</html>
