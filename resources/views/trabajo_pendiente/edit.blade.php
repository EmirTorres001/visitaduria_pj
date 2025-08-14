@extends('layouts.app')

@section('content')
<div style="padding: 20px; max-width: 800px; margin: auto;">
    <h2>Editar Trabajo Pendiente</h2>

    @if ($errors->any())
        <div style="color: red; margin-bottom: 10px;">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('trabajo_pendiente.update', $trabajo->id) }}" method="POST">
        @csrf
        @method('PUT')

        <div style="margin-bottom: 10px;">
            <label>Folio:</label>
            <input type="text" name="folio" value="{{ $trabajo->folio }}" required style="width: 100%; padding: 8px;">
        </div>

        <div style="margin-bottom: 10px;">
            <label>Número de Expediente:</label>
            <input type="text" name="numero_expediente" value="{{ $trabajo->numero_expediente }}" required style="width: 100%; padding: 8px;">
        </div>

        <div style="margin-bottom: 10px;">
            <label>Juzgado:</label>
            <select name="juzgado_id" id="juzgado-select" required style="width: 100%; padding: 8px;">
                <option value="">Seleccione un juzgado</option>
                @foreach($juzgados as $juzgado)
                    <option value="{{ $juzgado->id }}"
                        data-municipio="{{ $juzgado->municipio }}"
                        {{ $trabajo->juzgado_id == $juzgado->id ? 'selected' : '' }}>
                        {{ $juzgado->nombre }} ({{ $juzgado->tipo }})
                    </option>
                @endforeach
            </select>
        </div>

        <div style="margin-bottom: 10px;">
            <label>Municipio:</label>
            <input type="text" name="municipio" id="municipio" value="{{ $trabajo->municipio }}" readonly style="width: 100%; padding: 8px; background-color: #f0f0f0;">
        </div>

        <div style="margin-bottom: 10px;">
            <label>Fecha de Registro:</label>
            <input type="date" name="fecha_registro" value="{{ $trabajo->fecha_registro->format('Y-m-d') }}" required style="width: 100%; padding: 8px;">
        </div>

        <div style="margin-bottom: 10px;">
            <label>Fecha de Audiencia:</label>
            <input type="date" name="fecha_audiencia" value="{{ $trabajo->fecha_audiencia ? $trabajo->fecha_audiencia->format('Y-m-d') : '' }}" style="width: 100%; padding: 8px;">
        </div>

        <div style="margin-bottom: 10px;">
            <label>Tipo de Trabajo:</label>
            <input type="text" name="tipo_trabajo" value="{{ $trabajo->tipo_trabajo }}" required style="width: 100%; padding: 8px;">
        </div>

        <div style="margin-bottom: 10px;">
            <label>Estado:</label>
            <select name="estado" required style="width: 100%; padding: 8px;">
                @foreach(['Pendiente','En proceso','Requiere revisión','Finalizado'] as $estado)
                    <option value="{{ $estado }}" {{ $trabajo->estado == $estado ? 'selected' : '' }}>{{ $estado }}</option>
                @endforeach
            </select>
        </div>

        <div style="margin-bottom: 10px;">
            <label>Responsable:</label>
            <input type="text" name="responsable" value="{{ $trabajo->responsable }}" required style="width: 100%; padding: 8px;">
        </div>

        <div style="margin-bottom: 10px;">
            <label>Fecha Límite:</label>
            <input type="date" name="fecha_limite" value="{{ $trabajo->fecha_limite ? $trabajo->fecha_limite->format('Y-m-d') : '' }}" style="width: 100%; padding: 8px;">
        </div>

        <div style="margin-bottom: 10px;">
            <label>Tipo de Caso:</label>
            <select name="tipo_caso" required style="width: 100%; padding: 8px;">
                @foreach(['Civil','Penal','Familiar','Mixto'] as $tipo)
                    <option value="{{ $tipo }}" {{ $trabajo->tipo_caso == $tipo ? 'selected' : '' }}>{{ $tipo }}</option>
                @endforeach
            </select>
        </div>

        <button type="submit" style="background-color: #21584F; color: white; padding: 10px 20px; border: none; border-radius: 5px;">Actualizar Trabajo</button>
    </form>
</div>

<script>
    // Actualizar el municipio al cambiar el juzgado
    const juzgadoSelect = document.getElementById('juzgado-select');
    const municipioInput = document.getElementById('municipio');

    juzgadoSelect.addEventListener('change', function() {
        const selectedOption = this.options[this.selectedIndex];
        municipioInput.value = selectedOption.dataset.municipio || '';
    });
</script>
@endsection
