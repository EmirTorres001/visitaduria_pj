@extends('layouts.app')

@section('content')
<div style="padding: 20px; max-width: 500px; margin: auto;">
    <h2>Registrar Juzgado</h2>

    @if ($errors->any())
        <div style="color: red; margin-bottom: 10px;">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>⚠ {{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('juzgados.store') }}" method="POST">
        @csrf

        {{-- Nombre --}}
        <label>Nombre del Juzgado</label>
        <input type="text" name="nombre" value="{{ old('nombre') }}" required
               style="width: 100%; padding: 8px; margin-bottom: 10px;">

        {{-- Tipo de Juzgado --}}
        <label>Tipo de Juzgado</label>
        <select name="tipo" required style="width: 100%; padding: 8px; margin-bottom: 10px;">
            <option value="">Seleccione un tipo</option>
            <option value="Civil" {{ old('tipo') == 'Civil' ? 'selected' : '' }}>Civil</option>
            <option value="Familiar" {{ old('tipo') == 'Familiar' ? 'selected' : '' }}>Familiar</option>
            <option value="Penal" {{ old('tipo') == 'Penal' ? 'selected' : '' }}>Penal</option>
            <option value="Mixto" {{ old('tipo') == 'Mixto' ? 'selected' : '' }}>Mixto</option>
        </select>

        {{-- Municipio --}}
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
                <option value="{{ $mun }}" {{ old('municipio') == $mun ? 'selected' : '' }}>{{ $mun }}</option>
            @endforeach
        </select>

        <button type="submit"
                style="background-color: #21584F; color: white; padding: 10px 20px; border: none; border-radius: 5px;">
            Guardar
        </button>
    </form>
</div>
@endsection
