@extends('layouts.app')

@section('content')
<div style="padding: 20px;">

    @if(session('success'))
        <div style="color: green; margin-bottom: 10px;">
            {{ session('success') }}
        </div>
    @endif

    <a href="{{ route('juzgados.create') }}"
       style="background-color: #21584F; color: white; padding: 8px 15px; text-decoration: none; border-radius: 5px;">
        + Nuevo Juzgado
    </a>

    <table style="margin-top: 15px; width: 100%; border-collapse: collapse; text-align: center;">
        <thead style="background-color: #21584F; color: white;">
            <tr>
                <th style="padding: 10px;">ID</th>
                <th style="padding: 10px;">Nombre</th>
                <th style="padding: 10px;">Tipo</th>
                <th style="padding: 10px;">Municipio</th>
                <th style="padding: 10px;">Fecha Registro</th>
                <th style="padding: 10px;">Acciones</th> {{-- Nueva columna --}}
            </tr>
        </thead>
        <tbody>
            @foreach($juzgados as $juzgado)
            <tr style="border-bottom: 1px solid #ddd;">
                <td style="padding: 8px;">{{ $juzgado->id }}</td>
                <td style="padding: 8px; text-align: left;">{{ $juzgado->nombre }}</td>
                <td style="padding: 8px;">{{ $juzgado->tipo }}</td>
                <td style="padding: 8px;">{{ $juzgado->municipio }}</td>
                <td style="padding: 8px;">{{ $juzgado->created_at->format('d/m/Y') }}</td>
                <td style="padding: 8px;">

                    <a href="{{ route('juzgados.edit', $juzgado->id) }}"
                       style="background-color: #007BFF; color: white; padding: 5px 10px; text-decoration: none; border-radius: 3px; margin-right: 5px;">
                        Editar
                    </a>

                    <form action="{{ route('juzgados.destroy', $juzgado->id) }}" method="POST" style="display: inline-block;" onsubmit="return confirm('¿Estás seguro de eliminar este juzgado?');">
                        @csrf
                        @method('DELETE')
                        <button type="submit"
                                style="background-color: #dc3545; color: white; padding: 5px 10px; border: none; border-radius: 3px; cursor: pointer;">
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
