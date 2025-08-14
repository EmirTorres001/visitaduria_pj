@extends('layouts.app')

@section('content')
<div style="padding: 20px; max-width: 1200px; margin: auto;">

    <h2 style="text-align:center; margin-bottom: 20px;">Libro de Gobierno</h2>

    {{-- Botón de exportar PDF --}}
    <div style="text-align:center; margin-bottom: 20px;">
        <a href="{{ route('libro_gobierno.pdf') }}"
           style="background-color: #21584F;
                  color: white;
                  padding: 10px 20px;
                  border-radius: 5px;
                  text-decoration: none;
                  font-weight: bold;">
            📄 Exportar a PDF
        </a>
    </div>

    {{-- Juzgados --}}
    <h3>Juzgados Registrados</h3>
    <table style="width:100%; border-collapse: collapse; margin-bottom: 30px; box-shadow: 0 2px 6px rgba(0,0,0,0.15);">
        <thead style="background-color:#21584F; color:white;">
            <tr>
                <th style="padding: 10px;">ID</th>
                <th style="padding: 10px;">Nombre</th>
                <th style="padding: 10px;">Tipo</th>
                <th style="padding: 10px;">Municipio</th>
            </tr>
        </thead>
        <tbody>
            @foreach($juzgados as $j)
            <tr style="background-color: #f8f8f8; border-bottom: 1px solid #ddd;">
                <td style="padding: 8px;">{{ $j->id }}</td>
                <td style="padding: 8px;">{{ $j->nombre }}</td>
                <td style="padding: 8px;">{{ $j->tipo }}</td>
                <td style="padding: 8px;">{{ $j->municipio }}</td>
            </tr>
            @endforeach
        </tbody>
    </table>

    {{-- Visitadurías --}}
    <h3>Visitadurías</h3>
    <table style="width:100%; border-collapse: collapse; margin-bottom: 30px; box-shadow: 0 2px 6px rgba(0,0,0,0.15);">
        <thead style="background-color:#8B1D3D; color:white;">
            <tr>
                <th style="padding: 10px;">Folio</th>
                <th style="padding: 10px;">Juzgado</th>
                <th style="padding: 10px;">Municipio</th>
                <th style="padding: 10px;">Tipo Visita</th>
                <th style="padding: 10px;">Fecha Visita</th>
                <th style="padding: 10px;">Proceso</th>
            </tr>
        </thead>
        <tbody>
            @foreach($visitadurias as $v)
            <tr style="background-color: #fdf2f2; border-bottom: 1px solid #ddd;">
                <td style="padding: 8px;">{{ $v->folio }}</td>
                <td style="padding: 8px;">{{ $v->juzgado->nombre }}</td>
                <td style="padding: 8px;">{{ $v->municipio }}</td>
                <td style="padding: 8px;">{{ $v->tipo_visita }}</td>
                <td style="padding: 8px;">{{ \Carbon\Carbon::parse($v->fecha_visita)->format('d/m/Y') }}</td>
                <td style="padding: 8px;">{{ $v->proceso }}</td>
            </tr>
            @endforeach
        </tbody>
    </table>

    {{-- Seguimientos --}}
    <h3>Seguimiento de Juzgados</h3>
    <table style="width:100%; border-collapse: collapse; margin-bottom: 30px; box-shadow: 0 2px 6px rgba(0,0,0,0.15);">
        <thead style="background-color:#007BFF; color:white;">
            <tr>
                <th style="padding: 10px;">Folio Visitaduría</th>
                <th style="padding: 10px;">Juzgado</th>
                <th style="padding: 10px;">Municipio</th>
                <th style="padding: 10px;">Índice de Riesgo</th>
                <th style="padding: 10px;">Última Visita</th>
                <th style="padding: 10px;">Recomendaciones</th>
            </tr>
        </thead>
        <tbody>
            @foreach($seguimientos as $s)
            <tr style="background-color: #e6f0ff; border-bottom: 1px solid #ddd;">
                <td style="padding: 8px;">{{ $s->visitaduria->folio ?? '-' }}</td>
                <td style="padding: 8px;">{{ $s->visitaduria->juzgado->nombre ?? '-' }}</td>
                <td style="padding: 8px;">{{ $s->visitaduria->municipio ?? '-' }}</td>
                <td style="padding: 8px;">{{ $s->indice_riesgo }}</td>
                <td style="padding: 8px;">{{ \Carbon\Carbon::parse($s->ultima_visita)->format('d/m/Y') }}</td>
                <td style="padding: 8px;">{{ $s->recomendaciones }}</td>
            </tr>
            @endforeach
        </tbody>
    </table>

    {{-- Trabajos Pendientes --}}
    <h3>Trabajos Pendientes</h3>
    <table style="width:100%; border-collapse: collapse; box-shadow: 0 2px 6px rgba(0,0,0,0.15);">
        <thead style="background-color:#21584F; color:white;">
            <tr>
                <th style="padding: 10px;">Folio</th>
                <th style="padding: 10px;">Número Expediente</th>
                <th style="padding: 10px;">Juzgado</th>
                <th style="padding: 10px;">Municipio</th>
                <th style="padding: 10px;">Tipo Trabajo</th>
                <th style="padding: 10px;">Estado</th>
                <th style="padding: 10px;">Responsable</th>
                <th style="padding: 10px;">Fecha Límite</th>
                <th style="padding: 10px;">Tipo Caso</th>
            </tr>
        </thead>
        <tbody>
            @foreach($trabajos as $t)
            <tr style="background-color: #f8f8f8; border-bottom: 1px solid #ddd;">
                <td style="padding: 8px;">{{ $t->folio }}</td>
                <td style="padding: 8px;">{{ $t->numero_expediente }}</td>
                <td style="padding: 8px;">{{ $t->juzgado->nombre ?? '-' }}</td>
                <td style="padding: 8px;">{{ $t->municipio }}</td>
                <td style="padding: 8px;">{{ $t->tipo_trabajo }}</td>
                <td style="padding: 8px;">{{ $t->estado }}</td>
                <td style="padding: 8px;">{{ $t->responsable }}</td>
                <td style="padding: 8px;">{{ \Carbon\Carbon::parse($t->fecha_limite)->format('d/m/Y') }}</td>
                <td style="padding: 8px;">{{ $t->tipo_caso }}</td>
            </tr>
            @endforeach
        </tbody>
    </table>

</div>
@endsection
