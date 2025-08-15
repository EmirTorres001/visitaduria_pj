@extends('layouts.app')

@section('content')
<div style="max-width: 700px; margin: auto; padding: 20px;">

    <div style="background: #fff; padding: 30px 25px; border-radius: 15px; box-shadow: 0 10px 25px rgba(0,0,0,0.1);">
        <h2 style="text-align: center; color: #21584F; margin-bottom: 25px; font-weight: 700;">Editar Seguimiento de Juzgado</h2>

        @if ($errors->any())
            <div style="color: #E53935; margin-bottom: 20px; border: 1px solid #E53935; padding: 12px; border-radius: 8px;">
                <ul style="margin: 0; padding-left: 20px;">
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form action="{{ route('seguimiento_juzgados.update', $seguimiento->id) }}" method="POST">
            @csrf
            @method('PUT')

            <div style="display: grid; gap: 15px;">

                <select name="visitaduria_id" required
                        style="padding: 12px; border-radius: 8px; border: 1px solid #ccc; transition: 0.3s;">
                    <option value="">-- Seleccione una visitaduría --</option>
                    @foreach($visitadurias as $v)
                        <option value="{{ $v->id }}"
                            {{ $seguimiento->visitaduria_id == $v->id ? 'selected' : '' }}
                            data-juzgado="{{ $v->juzgado->nombre }}"
                            data-municipio="{{ $v->juzgado->municipio }}"
                            data-fecha="{{ $v->fecha_visita }}">
                            {{ $v->folio }} - {{ $v->juzgado->nombre }}
                        </option>
                    @endforeach
                </select>

                <input type="text" id="juzgado" readonly
                       value="{{ $seguimiento->visitaduria->juzgado->nombre ?? '' }}"
                       style="padding: 12px; border-radius: 8px; border: 1px solid #ccc; background-color: #f5f5f5; transition: 0.3s;"
                       placeholder="Juzgado">

                <input type="text" id="municipio" readonly
                       value="{{ $seguimiento->visitaduria->juzgado->municipio ?? '' }}"
                       style="padding: 12px; border-radius: 8px; border: 1px solid #ccc; background-color: #f5f5f5; transition: 0.3s;"
                       placeholder="Municipio">

                <input type="text" id="fecha_visita" readonly
                       value="{{ $seguimiento->visitaduria->fecha_visita ?? '' }}"
                       style="padding: 12px; border-radius: 8px; border: 1px solid #ccc; background-color: #f5f5f5; transition: 0.3s;"
                       placeholder="Fecha de Visita">

                <select name="indice_riesgo" required
                        style="padding: 12px; border-radius: 8px; border: 1px solid #ccc; transition: 0.3s;">
                    <option value="Alto" {{ $seguimiento->indice_riesgo == 'Alto' ? 'selected' : '' }}>Alto</option>
                    <option value="Medio" {{ $seguimiento->indice_riesgo == 'Medio' ? 'selected' : '' }}>Medio</option>
                    <option value="Bajo" {{ $seguimiento->indice_riesgo == 'Bajo' ? 'selected' : '' }}>Bajo</option>
                </select>

                <input type="date" name="ultima_visita" 
       value="{{ $seguimiento->ultima_visita ? \Carbon\Carbon::parse($seguimiento->ultima_visita)->format('Y-m-d') : '' }}"
       style="padding: 12px; border-radius: 8px; border: 1px solid #ccc; transition: 0.3s;">


                <textarea name="recomendaciones" rows="4"
                          style="padding: 12px; border-radius: 8px; border: 1px solid #ccc; transition: 0.3s;"
                          placeholder="Recomendaciones">{{ $seguimiento->recomendaciones }}</textarea>

                <button type="submit"
                        style="background: linear-gradient(90deg, #21584F, #4CAF50); color: white; padding: 14px; border: none; border-radius: 10px; font-size: 16px; font-weight: 600; cursor: pointer; transition: all 0.3s;">
                    Guardar Cambios
                </button>

            </div>
        </form>
    </div>
</div>

<script>
document.addEventListener('DOMContentLoaded', function () {
    const visitaduriaSelect = document.querySelector('select[name="visitaduria_id"]');
    const juzgadoInput = document.getElementById('juzgado');
    const municipioInput = document.getElementById('municipio');
    const fechaInput = document.getElementById('fecha_visita');

    visitaduriaSelect.addEventListener('change', function() {
        const selectedOption = this.options[this.selectedIndex];
        juzgadoInput.value = selectedOption.dataset.juzgado || '';
        municipioInput.value = selectedOption.dataset.municipio || '';
        fechaInput.value = selectedOption.dataset.fecha || '';
    });
});
</script>
@endsection
