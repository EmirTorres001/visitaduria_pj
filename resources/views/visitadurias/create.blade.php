@extends('layouts.app')

@section('content')
<div style="padding: 20px; max-width: 600px; margin: auto;">
    <h2>Registrar Visitaduría</h2>

    @if ($errors->any())
        <div style="color: red; margin-bottom: 10px;">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('visitadurias.store') }}" method="POST">
        @csrf

        <div style="margin-bottom: 10px;">
            <label>Juzgado:</label>
            <select name="juzgado_id" id="juzgado-select" required style="width: 100%; padding: 8px;">
                <option value="">Seleccione un juzgado</option>
                @foreach($juzgados as $juzgado)
                    <option value="{{ $juzgado->id }}" data-municipio="{{ $juzgado->municipio }}">
                        {{ $juzgado->nombre }} ({{ $juzgado->tipo }})
                    </option>
                @endforeach
            </select>
        </div>

        <div style="margin-bottom: 10px;">
            <label>Municipio:</label>
            <input type="text" id="municipio" name="municipio" readonly style="width: 100%; padding: 8px; background-color: #f0f0f0;">
        </div>

        <div style="margin-bottom: 10px;">
            <label>Tipo de visita:</label>
            <input type="text" name="tipo_visita" required style="width: 100%; padding: 8px;">
        </div>

        <div style="margin-bottom: 10px;">
            <label>Fecha de visita:</label>
            <input type="date" name="fecha_visita" required style="width: 100%; padding: 8px;">
        </div>

        <div style="margin-bottom: 10px;">
            <label>Proceso:</label>
            <input type="text" name="proceso" required style="width: 100%; padding: 8px;">
        </div>

        <button type="submit" style="background-color: #21584F; color: white; padding: 10px 20px; border: none; border-radius: 5px;">Registrar Visitaduría</button>
    </form>
</div>

<script>
    const juzgadoSelect = document.getElementById('juzgado-select');
    const municipioInput = document.getElementById('municipio');

    juzgadoSelect.addEventListener('change', function() {
        const selectedOption = this.options[this.selectedIndex];
        municipioInput.value = selectedOption.dataset.municipio || '';
    });
</script>
@endsection
