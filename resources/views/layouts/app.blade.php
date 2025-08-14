<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sistema de Juzgado</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <style>
        html, body {
            margin: 0;
            padding: 0;
            height: 100%;
            font-family: 'Segoe UI', sans-serif;
            background-color: #f4f4f4;
        }

        .app-bar {
            background-color: #8B1D3D;
            color: white;
            text-align: center;
            padding: 10px;
            font-size: 16px;
            font-weight: 500;
        }

        .menu-bar {
            background-color: #E6D1AD;
            display: flex;
            justify-content: center;
            gap: 20px;
            padding: 20px 0;
        }

        .menu-button {
            background-color: #21584F;
            color: white;
            border-radius: 15px;
            border: none;
            padding: 12px 20px;
            cursor: pointer;
            box-shadow: 4px 4px 6px rgba(0, 0, 0, 0.2);
            transition: transform 0.2s;
            text-decoration: none;
        }

        .menu-button:hover {
            transform: translateY(-2px);
        }

        /* Contenedor principal centrado */
        .main-container {
            display: flex;
            justify-content: center; /* centra horizontal */
            align-items: flex-start; /* arriba de la pantalla si hay mucho contenido */
            padding: 20px;
            min-height: calc(100vh - 120px); /* altura total menos barra + menú */
            box-sizing: border-box;
        }

        .content-wrapper {
            width: 100%;
            max-width: 1200px; /* para tablas y listados grandes */
        }
    </style>
</head>
<body>

    <div class="app-bar">
        SISTEMA DE JUZGADO CIVILES Y FAMILIARES
    </div>

    <div class="menu-bar">
        <a href="{{ route('informes.index') }}" class="menu-button">INFORMES</a>
        <a href="{{ route('seguimiento_juzgados.index') }}" class="menu-button">SEGUIMIENTOS JUZGADOS</a>
        <a href="{{ route('trabajo_pendiente.index') }}" class="menu-button">TRABAJO PENDIENTE</a>
        <a href="{{ route('libro_gobierno.index') }}" class="menu-button">LIBRO DE GOBIERNO</a>
        <a href="{{ route('juzgados.index') }}" class="menu-button">JUZGADOS</a>
        <a href="{{ route('visitadurias.index') }}" class="menu-button">VISITADURIAS</a>
    </div>

    <div class="main-container">
        <div class="content-wrapper">
            @yield('content')
        </div>
    </div>

</body>
</html>
