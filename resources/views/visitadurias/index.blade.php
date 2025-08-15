@extends('layouts.app')

@section('content')
<div style="padding: 20px;">

    @if(session('success'))
        <div style="color: green; margin-bottom: 10px;">
            {{ session('success') }}
        </div>
    @endif

    <a href="{{ route('visitadurias.create') }}"
       style="background-color: #21584F; color: white; padding: 8px 15px; text-decoration: none; border-radius: 5px;">
        + Nueva Visitaduría
    </a>

    <table style="margin-top: 15px; width: 100%; border-collapse: collapse; text-align: center;">
        <thead style="background-color: #21584F; color: white;">
            <tr>
                <th style="padding: 10px;">Folio</th>
                <th style="padding: 10px;">Juzgado</th>
                <th style="padding: 10px;">Municipio</th>
                <th style="padding: 10px;">Tipo Visita</th>
                <th style="padding: 10px;">Fecha Visita</th>
                <th style="padding: 10px;">Proceso</th>
                <th style="padding: 10px;">Acciones</th>
            </tr>
        </thead>
        <tbody>
            @foreach($visitadurias as $visitaduria)
                <tr style="border-bottom: 1px solid #ddd;">
                    <td style="padding: 8px;">{{ $visitaduria->folio }}</td>
                    <td style="padding: 8px; text-align: left;">{{ $visitaduria->juzgado->nombre ?? '-' }}</td>
                    <td style="padding: 8px;">{{ $visitaduria->municipio }}</td>
                    <td style="padding: 8px;">{{ $visitaduria->tipo_visita }}</td>
                    <td style="padding: 8px;">{{ \Carbon\Carbon::parse($visitaduria->fecha_visita)->format('d/m/Y') }}</td>
                    <td style="padding: 8px;">{{ $visitaduria->proceso }}</td>
                    <td style="padding: 8px;">
                        <a href="{{ route('visitadurias.edit', $visitaduria->id) }}" 
   class="btn btn-warning btn-sm" 
   style="margin-right: 5px;">
   ✏ Editar
</a>

<form action="{{ route('visitadurias.destroy', $visitaduria->id) }}" 
      method="POST" 
      style="display:inline;">
    @csrf
    @method('DELETE')
    <button type="submit" 
            class="btn btn-danger btn-sm"
            onclick="return confirm('¿Deseas eliminar esta visitaduría?')">
        🗑 Eliminar
    </button>
</form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
