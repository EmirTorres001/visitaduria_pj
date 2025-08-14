<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Informe Libro de Gobierno</title>
    <style>
        body { font-family: sans-serif; font-size: 12px; }
        table { width:100%; border-collapse: collapse; margin-bottom: 20px; }
        th, td { border: 1px solid #000; padding: 5px; text-align: left; }
        th { background-color: #21584F; color: white; }
        h2, h3 { text-align: center; margin: 10px 0; }
    </style>
</head>
<body>

    <h2>Libro de Gobierno - Informe</h2>

    {{-- Reutiliza tus tablas --}}
    @include('informes.tablas_pdf')

</body>
</html>
