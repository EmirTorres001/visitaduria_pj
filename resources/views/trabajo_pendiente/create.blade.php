@extends('layouts.app')

@section('content')
<div style="max-width: 600px; margin: auto; padding: 20px;">
    <h2>Registrar Trabajo Pendiente</h2>

    @if ($errors->any())
        <div style="color: red; margin-bottom: 10px;">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>⚠ {{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('trabajo_pendiente.store') }}" method="POST">
        @csrf

        <label>Folio</label>
        <input type="text" name="folio" value="{{ old('folio') }}" required style="width: 100%; padding: 8px; margin-bottom: 10px;">

        <label>Número de expediente</label>
        <input type="text" name="numero_expediente" value="{{ old('numero_expediente') }}" required style="width: 100%; padding: 8px; margin-bottom: 10px;">

        <label>Juzgado</label>
        <select name="juzgado_id" id="juzgado-select" required style="width: 100%; padding: 8px; margin-bottom: 10px;">
            <option value="">Seleccione un juzgado</option>
            @foreach($juzgados as $juzgado)
                <option value="{{ $juzgado->id }}"
                        data-municipio="{{ $juzgado->municipio }}"
                        {{ old('juzgado_id') == $juzgado->id ? 'selected' : '' }}>
                    {{ $juzgado->nombre }}
                </option>
            @endforeach
        </select>

        <label>Municipio</label>
        <input type="text" name="municipio" id="municipio" readonly
               value="{{ old('municipio') }}"
               style="width: 100%; padding: 8px; margin-bottom: 10px; background-color: #e9ecef;">

        <label>Fecha de registro</label>
        <input type="date" name="fecha_registro" value="{{ old('fecha_registro') }}" required style="width: 100%; padding: 8px; margin-bottom: 10px;">

        <label>Fecha de audiencia</label>
        <input type="date" name="fecha_audiencia" value="{{ old('fecha_audiencia') }}" style="width: 100%; padding: 8px; margin-bottom: 10px;">

        <label>Tipo de trabajo</label>
        <input type="text" name="tipo_trabajo" value="{{ old('tipo_trabajo') }}" required style="width: 100%; padding: 8px; margin-bottom: 10px;">

        <label>Estado / Estatus</label>
        <select name="estado" required style="width: 100%; padding: 8px; margin-bottom: 10px;">
            @foreach(['Pendiente', 'En proceso', 'Requiere revisión', 'Finalizado'] as $estado)
                <option value="{{ $estado }}" {{ old('estado') == $estado ? 'selected' : '' }}>{{ $estado }}</option>
            @endforeach
        </select>

        <label>Responsable</label>
        <input type="text" name="responsable" value="{{ old('responsable') }}" required style="width: 100%; padding: 8px; margin-bottom: 10px;">

        <label>Observaciones</label>
        <textarea name="observaciones" rows="3" style="width: 100%; padding: 8px; margin-bottom: 10px;">{{ old('observaciones') }}</textarea>

        <label>Fecha límite o plazo</label>
        <input type="date" name="fecha_limite" value="{{ old('fecha_limite') }}" style="width: 100%; padding: 8px; margin-bottom: 10px;">

        <label>Tipo de caso</label>
        <select name="tipo_caso" style="width: 100%; padding: 8px; margin-bottom: 10px;">
            <option value="">Seleccione tipo de caso</option>
            @foreach(['Civil', 'Penal', 'Familiar'] as $tipoCaso)
                <option value="{{ $tipoCaso }}" {{ old('tipo_caso') == $tipoCaso ? 'selected' : '' }}>{{ $tipoCaso }}</option>
            @endforeach
        </select>

        <button type="submit" style="background-color: #21584F; color: white; padding: 10px 20px; border: none; border-radius: 5px;">
            Guardar Trabajo
        </button>
    </form>
</div>

<script>
    document.addEventListener('DOMContentLoaded', function () {
        const juzgadoSelect = document.getElementById('juzgado-select');
        const municipioInput = document.getElementById('municipio');

        function actualizarMunicipio() {
            const selectedOption = juzgadoSelect.options[juzgadoSelect.selectedIndex];
            const municipio = selectedOption.getAttribute('data-municipio') || '';
            municipioInput.value = municipio;
        }

        juzgadoSelect.addEventListener('change', actualizarMunicipio);

        // Para cargar municipio si ya hay un juzgado seleccionado (por ejemplo, en edición o error de validación)
        actualizarMunicipio();
    });
</script>
@endsection
