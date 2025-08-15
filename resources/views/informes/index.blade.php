@extends('layouts.app')

@section('content')
<div style="padding: 20px; max-width: 1400px; margin: auto;">


    {{-- Totales --}}
    <div style="display: flex; gap: 20px; justify-content: space-around; margin-bottom: 30px;">
        <div style="background-color:#21584F; color:white; padding: 20px; border-radius:10px; flex:1; text-align:center;">
            <h3>{{ $totalJuzgados }}</h3>
            <p>Juzgados</p>
        </div>
        <div style="background-color:#8B1D3D; color:white; padding: 20px; border-radius:10px; flex:1; text-align:center;">
            <h3>{{ $totalVisitadurias }}</h3>
            <p>Visitadurías</p>
        </div>
        <div style="background-color:#007BFF; color:white; padding: 20px; border-radius:10px; flex:1; text-align:center;">
            <h3>{{ $totalTrabajos }}</h3>
            <p>Trabajos Pendientes</p>
        </div>
        <div style="background-color:#FF8C00; color:white; padding: 20px; border-radius:10px; flex:1; text-align:center;">
            <h3>{{ $totalSeguimientos }}</h3>
            <p>Seguimientos</p>
        </div>
    </div>

    {{-- Últimas visitadurías --}}
    <h3>Últimas Visitadurías</h3>
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
            @foreach($ultimasVisitadurias as $v)
            <tr style="border-bottom:1px solid #ddd;">
                <td>{{ $v->folio }}</td>
                <td>{{ $v->juzgado->nombre ?? '-' }}</td>
                <td>{{ $v->municipio }}</td>
                <td>{{ $v->tipo_visita }}</td>
                <td>{{ \Carbon\Carbon::parse($v->fecha_visita)->format('d/m/Y') }}</td>
                <td>{{ $v->proceso }}</td>
            </tr>
            @endforeach
        </tbody>
    </table>

    {{-- Trabajos pendientes --}}
    <h3>Trabajos Pendientes</h3>
    <table style="width:100%; border-collapse: collapse; margin-bottom: 30px;">
        <thead style="background-color:#21584F; color:white;">
            <tr>
                <th>Folio</th>
                <th>Expediente</th>
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
            <tr style="border-bottom:1px solid #ddd;">
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

    {{-- Seguimientos --}}
    <h3>Seguimientos</h3>
    <table style="width:100%; border-collapse: collapse; margin-bottom: 30px;">
        <thead style="background-color:#007BFF; color:white;">
            <tr>
                <th>Folio Visitaduría</th>
                <th>Juzgado</th>
                <th>Municipio</th>
                <th>Índice Riesgo</th>
                <th>Última Visita</th>
                <th>Recomendaciones</th>
            </tr>
        </thead>
        <tbody>
            @foreach($seguimientos as $s)
            <tr style="border-bottom:1px solid #ddd;">
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

</div>
@endsection
