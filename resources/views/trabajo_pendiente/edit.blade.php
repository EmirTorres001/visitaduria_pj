@extends('layouts.app')

@section('content')
<div style="max-width: 700px; margin: auto; padding: 20px;">

    <div style="background: #fff; padding: 30px 25px; border-radius: 15px; box-shadow: 0 10px 25px rgba(0,0,0,0.1);">
        <h2 style="text-align: center; color: #21584F; margin-bottom: 25px; font-weight: 700;">Editar Trabajo Pendiente</h2>

        @if ($errors->any())
            <div style="color: #E53935; margin-bottom: 20px; border: 1px solid #E53935; padding: 12px; border-radius: 8px;">
                <ul style="margin: 0; padding-left: 20px;">
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form action="{{ route('trabajo_pendiente.update', $trabajo->id) }}" method="POST">
            @csrf
            @method('PUT')

            <div style="display: grid; gap: 15px;">

                <input type="text" name="folio" placeholder="Folio" value="{{ $trabajo->folio }}" required
                       style="padding: 12px; border-radius: 8px; border: 1px solid #ccc; transition: 0.3s;">

                <input type="text" name="numero_expediente" placeholder="Número de Expediente" value="{{ $trabajo->numero_expediente }}" required
                       style="padding: 12px; border-radius: 8px; border: 1px solid #ccc; transition: 0.3s;">

                <select name="juzgado_id" id="juzgado-select" required
                        style="padding: 12px; border-radius: 8px; border: 1px solid #ccc; transition: 0.3s;">
                    <option value="">Seleccione un juzgado</option>
                    @foreach($juzgados as $juzgado)
                        <option value="{{ $juzgado->id }}"
                                data-municipio="{{ $juzgado->municipio }}"
                                {{ $trabajo->juzgado_id == $juzgado->id ? 'selected' : '' }}>
                            {{ $juzgado->nombre }} ({{ $juzgado->tipo }})
                        </option>
                    @endforeach
                </select>

                <input type="text" name="municipio" id="municipio" placeholder="Municipio" readonly
                       value="{{ $trabajo->municipio }}"
                       style="padding: 12px; border-radius: 8px; border: 1px solid #ccc; background-color: #f5f5f5; transition: 0.3s;">

                <input type="date" name="fecha_registro" value="{{ $trabajo->fecha_registro->format('Y-m-d') }}" required
                       style="padding: 12px; border-radius: 8px; border: 1px solid #ccc; transition: 0.3s;">

                <input type="date" name="fecha_audiencia" value="{{ $trabajo->fecha_audiencia ? $trabajo->fecha_audiencia->format('Y-m-d') : '' }}"
                       style="padding: 12px; border-radius: 8px; border: 1px solid #ccc; transition: 0.3s;">

                <input type="text" name="tipo_trabajo" placeholder="Tipo de Trabajo" value="{{ $trabajo->tipo_trabajo }}" required
                       style="padding: 12px; border-radius: 8px; border: 1px solid #ccc; transition: 0.3s;">

                <select name="estado" required
                        style="padding: 12px; border-radius: 8px; border: 1px solid #ccc; transition: 0.3s;">
                    @foreach(['Pendiente','En proceso','Requiere revisión','Finalizado'] as $estado)
                        <option value="{{ $estado }}" {{ $trabajo->estado == $estado ? 'selected' : '' }}>{{ $estado }}</option>
                    @endforeach
                </select>

                <input type="text" name="responsable" placeholder="Responsable" value="{{ $trabajo->responsable }}" required
                       style="padding: 12px; border-radius: 8px; border: 1px solid #ccc; transition: 0.3s;">

                <input type="date" name="fecha_limite" value="{{ $trabajo->fecha_limite ? $trabajo->fecha_limite->format('Y-m-d') : '' }}"
                       style="padding: 12px; border-radius: 8px; border: 1px solid #ccc; transition: 0.3s;">

                <select name="tipo_caso" required
                        style="padding: 12px; border-radius: 8px; border: 1px solid #ccc; transition: 0.3s;">
                    @foreach(['Civil','Penal','Familiar','Mixto'] as $tipo)
                        <option value="{{ $tipo }}" {{ $trabajo->tipo_caso == $tipo ? 'selected' : '' }}>{{ $tipo }}</option>
                    @endforeach
                </select>

                <button type="submit"
                        style="background: linear-gradient(90deg, #21584F, #4CAF50); color: white; padding: 14px; border: none; border-radius: 10px; font-size: 16px; font-weight: 600; cursor: pointer; transition: all 0.3s;">
                    Actualizar Trabajo
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
