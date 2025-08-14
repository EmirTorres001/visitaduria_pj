@extends('layouts.app')

@section('content')
<div style="display: flex; justify-content: center; align-items: center; min-height: 80vh;">
    <div style="
        background: #fff;
        padding: 30px 40px;
        border-radius: 15px;
        box-shadow: 0 8px 20px rgba(0,0,0,0.15);
        width: 100%;
        max-width: 500px;
    ">
        <h2 style="text-align: center; color: #21584F; margin-bottom: 25px;">Editar Visitaduría</h2>

        @if ($errors->any())
            <div style="color: #E53935; margin-bottom: 20px; border: 1px solid #E53935; padding: 10px; border-radius: 8px;">
                <ul style="margin: 0; padding-left: 20px;">
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form action="{{ route('visitadurias.update', $visitaduria->id) }}" method="POST">
            @csrf
            @method('PUT')

            <div style="margin-bottom: 15px;">
                <label style="display: block; margin-bottom: 5px; font-weight: 500;">Juzgado:</label>
                <select name="juzgado_id" id="juzgado-select" required
                        style="width: 100%; padding: 10px; border-radius: 8px; border: 1px solid #ccc; transition: all 0.2s;">
                    <option value="">Seleccione un juzgado</option>
                    @foreach($juzgados as $juzgado)
                        <option value="{{ $juzgado->id }}" data-municipio="{{ $juzgado->municipio }}"
                            {{ $visitaduria->juzgado_id == $juzgado->id ? 'selected' : '' }}>
                            {{ $juzgado->nombre }} ({{ $juzgado->tipo }})
                        </option>
                    @endforeach
                </select>
            </div>

            <div style="margin-bottom: 15px;">
                <label style="display: block; margin-bottom: 5px; font-weight: 500;">Municipio:</label>
                <input type="text" id="municipio" name="municipio" readonly
                       value="{{ $visitaduria->municipio }}"
                       style="width: 100%; padding: 10px; border-radius: 8px; border: 1px solid #ccc; background-color: #f9f9f9;">
            </div>

            <div style="margin-bottom: 15px;">
                <label style="display: block; margin-bottom: 5px; font-weight: 500;">Tipo de visita:</label>
                <input type="text" name="tipo_visita" required
                       value="{{ $visitaduria->tipo_visita }}"
                       style="width: 100%; padding: 10px; border-radius: 8px; border: 1px solid #ccc; transition: all 0.2s;">
            </div>

            <div style="margin-bottom: 15px;">
                <label style="display: block; margin-bottom: 5px; font-weight: 500;">Fecha de visita:</label>
                <input type="date" name="fecha_visita" required
                       value="{{ date('Y-m-d', strtotime($visitaduria->fecha_visita)) }}"
                       style="width: 100%; padding: 10px; border-radius: 8px; border: 1px solid #ccc; transition: all 0.2s;">
            </div>

            <div style="margin-bottom: 20px;">
                <label style="display: block; margin-bottom: 5px; font-weight: 500;">Proceso:</label>
                <input type="text" name="proceso" required
                       value="{{ $visitaduria->proceso }}"
                       style="width: 100%; padding: 10px; border-radius: 8px; border: 1px solid #ccc; transition: all 0.2s;">
            </div>

            <button type="submit"
                    style="
                        width: 100%;
                        background: linear-gradient(90deg, #21584F, #4CAF50);
                        color: white;
                        font-weight: 600;
                        padding: 12px;
                        border: none;
                        border-radius: 10px;
                        cursor: pointer;
                        box-shadow: 0 4px 12px rgba(0,0,0,0.2);
                        transition: all 0.3s ease;
                    "
                    onmouseover="this.style.opacity='0.9'; this.style.transform='translateY(-2px)';"
                    onmouseout="this.style.opacity='1'; this.style.transform='translateY(0)';">
                Actualizar Visitaduría
            </button>
        </form>
    </div>
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
