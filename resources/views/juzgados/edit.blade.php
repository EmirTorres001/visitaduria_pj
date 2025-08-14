@extends('layouts.app')

@section('content')
<div style="padding: 20px; max-width: 500px; margin: auto;">
    <h2>Editar Juzgado</h2>

    @if ($errors->any())
        <div style="color: red; margin-bottom: 10px;">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>⚠ {{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('juzgados.update', $juzgado->id) }}" method="POST">
        @csrf
        @method('PUT')

        <label>Nombre del Juzgado</label>
        <input type="text" name="nombre" value="{{ old('nombre', $juzgado->nombre) }}" required
               style="width: 100%; padding: 8px; margin-bottom: 10px;">

        <label>Tipo de Juzgado</label>
        <select name="tipo" required style="width: 100%; padding: 8px; margin-bottom: 10px;">
            <option value="">Seleccione un tipo</option>
            @foreach(['Civil', 'Familiar', 'Penal', 'Mixto'] as $tipo)
                <option value="{{ $tipo }}" {{ (old('tipo', $juzgado->tipo) == $tipo) ? 'selected' : '' }}>{{ $tipo }}</option>
            @endforeach
        </select>

        <label>Municipio</label>
        <select name="municipio" required style="width: 100%; padding: 8px; margin-bottom: 10px;">
            <option value="">Seleccione un municipio</option>
            @php
                $municipios = [
                    'Abasolo', 'Aldama', 'Altamira', 'Antiguo Morelos', 'Burgos', 'Bustamante', 'Camargo', 'Casas',
                    'Ciudad Madero', 'Cruillas', 'Gómez Farías', 'González', 'Güémez', 'Guerrero', 'Gustavo Díaz Ordaz',
                    'Hidalgo', 'Jaumave', 'Jiménez', 'Llera', 'Mainero', 'El Mante', 'Matamoros', 'Méndez', 'Mier',
                    'Miguel Alemán', 'Miquihuana', 'Nuevo Laredo', 'Nuevo Morelos', 'Ocampo', 'Padilla', 'Palmillas',
                    'Reynosa', 'Río Bravo', 'San Carlos', 'San Fernando', 'San Nicolás', 'Soto la Marina', 'Tampico',
                    'Tula', 'Valle Hermoso', 'Victoria', 'Villagrán', 'Xicoténcatl'
                ];
            @endphp

            @foreach ($municipios as $mun)
                <option value="{{ $mun }}" {{ (old('municipio', $juzgado->municipio) == $mun) ? 'selected' : '' }}>{{ $mun }}</option>
            @endforeach
        </select>

        <button type="submit"
                style="background-color: #21584F; color: white; padding: 10px 20px; border: none; border-radius: 5px;">
            Actualizar
        </button>
    </form>
</div>
@endsection
