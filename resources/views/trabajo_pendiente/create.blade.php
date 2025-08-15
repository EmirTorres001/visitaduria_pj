@extends('layouts.app')

@section('content')
<div style="max-width: 700px; margin: auto; padding: 20px;">

    <div style="background: #fff; padding: 30px 25px; border-radius: 15px; box-shadow: 0 10px 25px rgba(0,0,0,0.1);">
        <h2 style="text-align: center; color: #21584F; margin-bottom: 25px; font-weight: 700;">Registrar Trabajo Pendiente</h2>

        @if ($errors->any())
            <div style="color: #E53935; margin-bottom: 20px; border: 1px solid #E53935; padding: 12px; border-radius: 8px;">
                <ul style="margin: 0; padding-left: 20px;">
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form action="{{ route('trabajo_pendiente.store') }}" method="POST">
            @csrf

            <div style="display: grid; gap: 15px;">
                <input type="text" name="folio" placeholder="Folio" value="{{ old('folio') }}" required 
                       style="padding: 12px; border-radius: 8px; border: 1px solid #ccc; transition: 0.3s;">

                <input type="text" name="numero_expediente" placeholder="Número de expediente" value="{{ old('numero_expediente') }}" required
                       style="padding: 12px; border-radius: 8px; border: 1px solid #ccc; transition: 0.3s;">

                <select name="juzgado_id" id="juzgado-select" required
                        style="padding: 12px; border-radius: 8px; border: 1px solid #ccc; transition: 0.3s;">
                    <option value="">Seleccione un juzgado</option>
                    @foreach($juzgados as $juzgado)
                        <option value="{{ $juzgado->id }}" data-municipio="{{ $juzgado->municipio }}"
                                {{ old('juzgado_id') == $juzgado->id ? 'selected' : '' }}>
                            {{ $juzgado->nombre }}
                        </option>
                    @endforeach
                </select>

                <input type="text" name="municipio" id="municipio" placeholder="Municipio" readonly
                       value="{{ old('municipio') }}"
                       style="padding: 12px; border-radius: 8px; border: 1px solid #ccc; background-color: #f5f5f5; transition: 0.3s;">

                    <!-- Fecha de Registro -->
    <label for="fecha_registro" style="font-weight: 600;">Fecha de Registro</label>
    <input type="date" name="fecha_registro" id="fecha_registro" value="{{ old('fecha_registro') }}" required
           style="padding: 12px; border-radius: 8px; border: 1px solid #ccc; transition: 0.3s;">

    <!-- Fecha de Audiencia -->
    <label for="fecha_audiencia" style="font-weight: 600;">Fecha de Audiencia</label>
    <input type="date" name="fecha_audiencia" id="fecha_audiencia" value="{{ old('fecha_audiencia') }}"
           style="padding: 12px; border-radius: 8px; border: 1px solid #ccc; transition: 0.3s;">



                <input type="text" name="tipo_trabajo" placeholder="Tipo de trabajo" value="{{ old('tipo_trabajo') }}" required
                       style="padding: 12px; border-radius: 8px; border: 1px solid #ccc; transition: 0.3s;">

                <select name="estado" required
                        style="padding: 12px; border-radius: 8px; border: 1px solid #ccc; transition: 0.3s;">
                    @foreach(['Pendiente', 'En proceso', 'Requiere revisión', 'Finalizado'] as $estado)
                        <option value="{{ $estado }}" {{ old('estado') == $estado ? 'selected' : '' }}>{{ $estado }}</option>
                    @endforeach
                </select>

                <input type="text" name="responsable" placeholder="Responsable" value="{{ old('responsable') }}" required
                       style="padding: 12px; border-radius: 8px; border: 1px solid #ccc; transition: 0.3s;">

                <textarea name="observaciones" rows="3" placeholder="Observaciones"
                          style="padding: 12px; border-radius: 8px; border: 1px solid #ccc; transition: 0.3s;">{{ old('observaciones') }}</textarea>

                    <!-- Fecha Límite -->
    <label for="fecha_limite" style="font-weight: 600;">Fecha Límite</label>
    <input type="date" name="fecha_limite" id="fecha_limite" value="{{ old('fecha_limite') }}"
           style="padding: 12px; border-radius: 8px; border: 1px solid #ccc; transition: 0.3s;">

                <select name="tipo_caso" style="padding: 12px; border-radius: 8px; border: 1px solid #ccc; transition: 0.3s;">
                    <option value="">Seleccione tipo de caso</option>
                    @foreach(['Civil', 'Penal', 'Familiar'] as $tipoCaso)
                        <option value="{{ $tipoCaso }}" {{ old('tipo_caso') == $tipoCaso ? 'selected' : '' }}>{{ $tipoCaso }}</option>
                    @endforeach
                </select>

                <button type="submit"
                        style="background: linear-gradient(90deg, #21584F, #4CAF50); color: white; padding: 14px; border: none; border-radius: 10px; font-size: 16px; font-weight: 600; cursor: pointer; transition: all 0.3s;">
                    Guardar Trabajo
                </button>
            </div>
        </form>
    </div>
</div>

<script>
document.addEventListener('DOMContentLoaded', function () {
    const juzgadoSelect = document.getElementById('juzgado-select');
    const municipioInput = document.getElementById('municipio');

    function actualizarMunicipio() {
        const selectedOption = juzgadoSelect.options[juzgadoSelect.selectedIndex];
        municipioInput.value = selectedOption.getAttribute('data-municipio') || '';
    }

    juzgadoSelect.addEventListener('change', actualizarMunicipio);
    actualizarMunicipio();
});
</script>
@endsection
