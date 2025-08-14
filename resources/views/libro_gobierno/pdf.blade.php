<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Libro de Gobierno</title>
    <style>
        body { font-family: DejaVu Sans, sans-serif; font-size: 12px; }
        table { width: 100%; border-collapse: collapse; margin-bottom: 20px; }
        th, td { border: 1px solid #000; padding: 6px; text-align: left; }
        th { background-color: #ccc; }
        h2, h3 { text-align: center; }
    </style>
</head>
<body>

<h2>Libro de Gobierno</h2>

<h3>Juzgados</h3>
<table>
    <thead>
        <tr>
            <th>ID</th><th>Nombre</th><th>Tipo</th><th>Municipio</th>
        </tr>
    </thead>
    <tbody>
        @foreach($juzgados as $j)
        <tr>
            <td>{{ $j->id }}</td>
            <td>{{ $j->nombre }}</td>
            <td>{{ $j->tipo }}</td>
            <td>{{ $j->municipio }}</td>
        </tr>
        @endforeach
    </tbody>
</table>

<h3>Visitadurías</h3>
<table>
    <thead>
        <tr>
            <th>Folio</th><th>Juzgado</th><th>Municipio</th><th>Tipo Visita</th><th>Fecha Visita</th><th>Proceso</th>
        </tr>
    </thead>
    <tbody>
        @foreach($visitadurias as $v)
        <tr>
            <td>{{ $v->folio }}</td>
            <td>{{ $v->juzgado->nombre }}</td>
            <td>{{ $v->municipio }}</td>
            <td>{{ $v->tipo_visita }}</td>
            <td>{{ \Carbon\Carbon::parse($v->fecha_visita)->format('d/m/Y') }}</td>
            <td>{{ $v->proceso }}</td>
        </tr>
        @endforeach
    </tbody>
</table>

<h3>Seguimiento de Juzgados</h3>
<table>
    <thead>
        <tr>
            <th>Folio Visitaduría</th><th>Juzgado</th><th>Municipio</th><th>Índice de Riesgo</th><th>Última Visita</th><th>Recomendaciones</th>
        </tr>
    </thead>
    <tbody>
        @foreach($seguimientos as $s)
        <tr>
            <td>{{ $s->visitaduria->folio ?? '-' }}</td>
            <td>{{ $s->visitaduria->juzgado->nombre ?? '-' }}</td>
            <td>{{ $s->visitaduria->municipio ?? '-' }}</td>
            <td>{{ $s->indice_riesgo }}</td>
            <td>{{ \Carbon\Carbon::parse($s->ultima_visita)->format('d/m/Y') }}</td>
            <td>{{ $s->recomendaciones }}</td>
        </tr>
        @endforeach
    </tbody>
</table>

<h3>Trabajos Pendientes</h3>
<table>
    <thead>
        <tr>
            <th>Folio</th><th>Número Expediente</th><th>Juzgado</th><th>Municipio</th><th>Tipo Trabajo</th><th>Estado</th><th>Responsable</th><th>Fecha Límite</th><th>Tipo Caso</th>
        </tr>
    </thead>
    <tbody>
        @foreach($trabajos as $t)
        <tr>
            <td>{{ $t->folio }}</td>
            <td>{{ $t->numero_expediente }}</td>
            <td>{{ $t->juzgado->nombre ?? '-' }}</td>
            <td>{{ $t->municipio }}</td>
            <td>{{ $t->tipo_trabajo }}</td>
            <td>{{ $t->estado }}</td>
            <td>{{ $t->responsable }}</td>
            <td>{{ \Carbon\Carbon::parse($t->fecha_limite)->format('d/m/Y') }}</td>
            <td>{{ $t->tipo_caso }}</td>
        </tr>
        @endforeach
    </tbody>
</table>

</body>
</html>
