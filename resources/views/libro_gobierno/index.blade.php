@extends('layouts.app')

@section('content')
<div style="padding: 20px; max-width: 1200px; margin: auto;">

    <h2 style="text-align:center; margin-bottom: 20px;">Libro de Gobierno</h2>

    {{-- Juzgados --}}
    <h3>Juzgados Registrados</h3>
    <table style="width:100%; border-collapse: collapse; margin-bottom: 30px;">
        <thead style="background-color:#21584F; color:white;">
            <tr>
                <th>ID</th>
                <th>Nombre</th>
                <th>Tipo</th>
                <th>Municipio</th>
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

    {{-- Visitadurías --}}
    <h3>Visitadurías</h3>
    <table style="width:100%; border-collapse: collapse; margin-bottom: 30px;">
        <thead style="background-color:#8B1D3D; color:white;">
            <tr>
                <th>Folio</th>
                <th>Juzgado</th>
                <th>Municipio</th>
                <th>Tipo Visita</th>
                <th>Fecha Visita</th>
                <th>Proceso</th>
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

    {{-- Seguimientos --}}
    <h3>Seguimiento de Juzgados</h3>
    <table style="width:100%; border-collapse: collapse; margin-bottom: 30px;">
        <thead style="background-color:#007BFF; color:white;">
            <tr>
                <th>Folio Visitaduría</th>
                <th>Juzgado</th>
                <th>Municipio</th>
                <th>Índice de Riesgo</th>
                <th>Última Visita</th>
                <th>Recomendaciones</th>
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

    {{-- Trabajo Pendiente --}}
    <h3>Trabajos Pendientes</h3>
    <table style="width:100%; border-collapse: collapse;">
        <thead style="background-color:#21584F; color:white;">
            <tr>
                <th>Folio</th>
                <th>Número Expediente</th>
                <th>Juzgado</th>
                <th>Municipio</th>
                <th>Tipo Trabajo</th>
                <th>Estado</th>
                <th>Responsable</th>
                <th>Fecha Límite</th>
                <th>Tipo Caso</th>
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

</div>
@endsection
