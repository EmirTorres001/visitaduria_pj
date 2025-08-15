@extends('layouts.app')

@section('content')
<div style="padding: 20px;">

    <a href="{{ route('seguimiento_juzgados.create') }}" style="background: #21584F; color: white; padding: 8px 15px; border-radius: 5px; text-decoration: none;">
        + Nuevo Seguimiento
    </a>

    @if(session('success'))
        <div style="color: green; margin-top: 10px;">
            {{ session('success') }}
        </div>
    @endif

    <table style="margin-top: 15px; width: 100%; border-collapse: collapse; text-align: center;">
        <thead style="background-color: #21584F; color: white;">
            <tr>
                <th>Folio</th>
                <th>Juzgado</th>
                <th>Municipio</th>
                <th>Fecha Registro Visita</th>
                <th>Índice Riesgo</th>
                <th>Última Visita</th>
                <th>Recomendaciones</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody>
            @foreach($seguimientos as $s)
            <tr style="border-bottom: 1px solid #ddd;">
                <td>{{ $s->visitaduria->folio }}</td>
                <td>{{ $s->visitaduria->juzgado->nombre }}</td>
                <td>{{ $s->visitaduria->juzgado->municipio }}</td>
                <td>{{ $s->visitaduria->fecha_visita }}</td>
                <td>{{ $s->indice_riesgo }}</td>
                <td>{{ $s->ultima_visita ?? '-' }}</td>
                <td>{{ $s->recomendaciones ?? '-' }}</td>
                <td>
                    <a href="{{ route('seguimiento_juzgados.edit', $s->id) }}" 
                       style="background: rgb(0, 193, 251); color: white; padding: 5px 10px; border-radius: 5px; text-decoration: none;">
                        Editar
                    </a>
                    <form action="{{ route('seguimiento_juzgados.destroy', $s->id) }}" method="POST" style="display:inline;">
                        @csrf
                        @method('DELETE')
                        <button type="submit" 
                                onclick="return confirm('¿Seguro que deseas eliminar este seguimiento?')" 
                                style="background: red; color: white; padding: 5px 10px; border-radius: 5px; border: none;">
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
