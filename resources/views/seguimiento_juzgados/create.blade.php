@extends('layouts.app')

@section('content')
<div style="padding: 20px; max-width: 700px; margin: auto;">
    <h2 style="color: #21584F; text-align: center; margin-bottom: 20px;">Registrar Seguimiento de Juzgado</h2>

    <form action="{{ route('seguimiento_juzgados.store') }}" method="POST" 
          style="background: #f9f9f9; padding: 20px; border-radius: 10px; box-shadow: 0px 2px 8px rgba(0,0,0,0.1);">
        @csrf

        <div style="margin-bottom: 15px;">
            <label style="font-weight: bold;">Folio de Visitaduría</label>
            <select id="visitaduria_select" name="visitaduria_id" required 
                    style="width: 100%; padding: 8px; border-radius: 5px; border: 1px solid #ccc;">
                <option value="">-- Seleccione una visitaduría --</option>
                @foreach($visitadurias as $v)
                    <option value="{{ $v->id }}"
                            data-juzgado="{{ $v->juzgado->nombre }}"
                            data-municipio="{{ $v->juzgado->municipio }}"
                            data-fecha="{{ $v->fecha_visita }}">
                        {{ $v->folio }} - {{ $v->juzgado->nombre }}
                    </option>
                @endforeach
            </select>
        </div>

        <div style="margin-bottom: 15px;">
            <label style="font-weight: bold;">Juzgado</label>
            <input type="text" id="juzgado" readonly
                   style="width: 100%; padding: 8px; border-radius: 5px; border: 1px solid #ccc; background: #eee;">
        </div>

        <div style="margin-bottom: 15px;">
            <label style="font-weight: bold;">Municipio</label>
            <input type="text" id="municipio" readonly
                   style="width: 100%; padding: 8px; border-radius: 5px; border: 1px solid #ccc; background: #eee;">
        </div>

        <div style="margin-bottom: 15px;">
            <label style="font-weight: bold;">Fecha de Registro de Visita</label>
            <input type="text" id="fecha_visita" readonly
                   style="width: 100%; padding: 8px; border-radius: 5px; border: 1px solid #ccc; background: #eee;">
        </div>

        <div style="margin-bottom: 15px;">
            <label style="font-weight: bold;">Índice de Riesgo</label>
            <select name="indice_riesgo" required
                    style="width: 100%; padding: 8px; border-radius: 5px; border: 1px solid #ccc;">
                <option value="Alto">Alto</option>
                <option value="Medio">Medio</option>
                <option value="Bajo">Bajo</option>
            </select>
        </div>

        <div style="margin-bottom: 15px;">
            <label style="font-weight: bold;">Última Visita</label>
            <input type="date" name="ultima_visita"
                   style="width: 100%; padding: 8px; border-radius: 5px; border: 1px solid #ccc;">
        </div>

        <div style="margin-bottom: 20px;">
            <label style="font-weight: bold;">Recomendaciones</label>
            <textarea name="recomendaciones" rows="4"
                      style="width: 100%; padding: 8px; border-radius: 5px; border: 1px solid #ccc;"></textarea>
        </div>

        <div style="text-align: center;">
            <button type="submit"
                    style="background: #21584F; color: white; padding: 10px 20px; border: none; border-radius: 5px; font-size: 16px; cursor: pointer;">
                Guardar Seguimiento
            </button>
        </div>
    </form>
</div>

<script>
document.getElementById('visitaduria_select').addEventListener('change', function() {
    let option = this.options[this.selectedIndex];
    document.getElementById('juzgado').value = option.getAttribute('data-juzgado') || '';
    document.getElementById('municipio').value = option.getAttribute('data-municipio') || '';
    document.getElementById('fecha_visita').value = option.getAttribute('data-fecha') || '';
});
</script>
@endsection
