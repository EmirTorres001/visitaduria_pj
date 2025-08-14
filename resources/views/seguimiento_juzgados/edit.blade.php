@extends('layouts.app')

@section('content')
<div style="padding: 20px;">
    <h2>Editar Seguimiento</h2>

    <form action="{{ route('seguimiento_juzgados.update', $seguimiento->id) }}" method="POST">
        @csrf
        @method('PUT')

        <label>Folio de Visitaduría</label>
        <select name="visitaduria_id" required>
            @foreach($visitadurias as $v)
                <option value="{{ $v->id }}" 
                    {{ $seguimiento->visitaduria_id == $v->id ? 'selected' : '' }}>
                    {{ $v->folio }} - {{ $v->juzgado->nombre }}
                </option>
            @endforeach
        </select>
        <br><br>

        <label>Índice de Riesgo</label>
        <select name="indice_riesgo" required>
            <option value="Alto" {{ $seguimiento->indice_riesgo == 'Alto' ? 'selected' : '' }}>Alto</option>
            <option value="Medio" {{ $seguimiento->indice_riesgo == 'Medio' ? 'selected' : '' }}>Medio</option>
            <option value="Bajo" {{ $seguimiento->indice_riesgo == 'Bajo' ? 'selected' : '' }}>Bajo</option>
        </select>
        <br><br>

        <label>Última Visita</label>
        <input type="date" name="ultima_visita" value="{{ $seguimiento->ultima_visita }}">
        <br><br>

        <label>Recomendaciones</label>
        <textarea name="recomendaciones">{{ $seguimiento->recomendaciones }}</textarea>
        <br><br>

        <button type="submit" style="background: #21584F; color: white; padding: 8px 15px; border: none; border-radius: 5px;">
            Guardar Cambios
        </button>
    </form>
</div>
@endsection
