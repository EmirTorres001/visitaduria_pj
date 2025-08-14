@extends('layouts.app')

@section('content')
<div style="padding: 20px;">

    @if(session('success'))
        <div style="color: green; margin-bottom: 10px;">
            {{ session('success') }}
        </div>
    @endif

    <a href="{{ route('trabajo_pendiente.create') }}"
       style="background-color: #21584F; color: white; padding: 8px 15px; text-decoration: none; border-radius: 5px;">
        + Nuevo Trabajo
    </a>

    <table style="margin-top: 15px; width: 100%; border-collapse: collapse; text-align: center;">
        <thead style="background-color: #21584F; color: white;">
            <tr>
                <th style="padding: 10px;">Folio</th>
                <th style="padding: 10px;">Número Expediente</th>
                <th style="padding: 10px;">Juzgado</th>
                <th style="padding: 10px;">Municipio</th>
                <th style="padding: 10px;">Fecha Registro</th>
                <th style="padding: 10px;">Fecha Audiencia</th>
                <th style="padding: 10px;">Tipo Trabajo</th>
                <th style="padding: 10px;">Estado</th>
                <th style="padding: 10px;">Responsable</th>
                <th style="padding: 10px;">Fecha Límite</th>
                <th style="padding: 10px;">Tipo Caso</th>
                <th style="padding: 10px;">Acciones</th>
            </tr>
        </thead>
        <tbody>
            @foreach($trabajos as $trabajo)
            <tr style="border-bottom: 1px solid #ddd;">
                <td style="padding: 8px;">{{ $trabajo->folio }}</td>
                <td style="padding: 8px;">{{ $trabajo->numero_expediente }}</td>
                <td style="padding: 8px; text-align: left;">{{ $trabajo->juzgado->nombre }}</td>
                <td style="padding: 8px;">{{ $trabajo->municipio }}</td>
                <td style="padding: 8px;">{{ $trabajo->fecha_registro->format('d/m/Y') }}</td>
                <td style="padding: 8px;">{{ $trabajo->fecha_audiencia ? $trabajo->fecha_audiencia->format('d/m/Y') : '-' }}</td>
                <td style="padding: 8px;">{{ $trabajo->tipo_trabajo }}</td>
                <td style="padding: 8px;">{{ $trabajo->estado }}</td>
                <td style="padding: 8px;">{{ $trabajo->responsable }}</td>
                <td style="padding: 8px;">{{ date('d/m/Y', strtotime($trabajo->fecha_limite)) }}</td>
                <td style="padding: 8px;">{{ $trabajo->tipo_caso }}</td>
                <td style="padding: 8px;">
                    <a href="{{ route('trabajo_pendiente.edit', $trabajo->id) }}"
                       style="background-color: #4CAF50; color: white; padding: 5px 10px; text-decoration: none; border-radius: 4px;">
                        Editar
                    </a>

                    <form action="{{ route('trabajo_pendiente.destroy', $trabajo->id) }}" method="POST" style="display:inline;">
                        @csrf
                        @method('DELETE')
                        <button type="submit"
                                onclick="return confirm('¿Seguro que deseas eliminar este trabajo?')"
                                style="background-color: #E53935; color: white; padding: 5px 10px; border: none; border-radius: 4px; cursor: pointer;">
                            Eliminar
                        </button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
