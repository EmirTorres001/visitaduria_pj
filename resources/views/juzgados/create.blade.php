@extends('layouts.app')

@section('content')
<div style="display: flex; justify-content: center; align-items: center; min-height: 80vh; background: #f4f4f4; padding: 20px;">
    
    <div style="background: white; padding: 30px; border-radius: 12px; box-shadow: 0 4px 12px rgba(0,0,0,0.1); max-width: 500px; width: 100%;">
        <h2 style="text-align: center; color: #21584F; margin-bottom: 25px;">Registrar Juzgado</h2>

        @if ($errors->any())
            <div style="color: red; margin-bottom: 15px;">
                <ul style="padding-left: 20px;">
                    @foreach ($errors->all() as $error)
                        <li>⚠ {{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form action="{{ route('juzgados.store') }}" method="POST">
            @csrf

            {{-- Nombre --}}
            <div style="margin-bottom: 15px;">
                <label style="font-weight: bold;">Nombre del Juzgado</label>
                <input type="text" name="nombre" value="{{ old('nombre') }}" required
                       style="width: 100%; padding: 10px; border-radius: 6px; border: 1px solid #ccc;">
            </div>

            {{-- Tipo de Juzgado --}}
            <div style="margin-bottom: 15px;">
                <label style="font-weight: bold;">Tipo de Juzgado</label>
                <select name="tipo" required style="width: 100%; padding: 10px; border-radius: 6px; border: 1px solid #ccc;">
                    <option value="">Seleccione un tipo</option>
                    <option value="Civil" {{ old('tipo') == 'Civil' ? 'selected' : '' }}>Civil</option>
                    <option value="Familiar" {{ old('tipo') == 'Familiar' ? 'selected' : '' }}>Familiar</option>
                    <option value="Penal" {{ old('tipo') == 'Penal' ? 'selected' : '' }}>Penal</option>
                    <option value="Mixto" {{ old('tipo') == 'Mixto' ? 'selected' : '' }}>Mixto</option>
                </select>
            </div>

            {{-- Municipio --}}
            <div style="margin-bottom: 20px;">
                <label style="font-weight: bold;">Municipio</label>
                <select name="municipio" required style="width: 100%; padding: 10px; border-radius: 6px; border: 1px solid #ccc;">
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
            </div>

            <div style="text-align: center;">
                <button type="submit"
                        style="background-color: #21584F; color: white; padding: 12px 25px; border: none; border-radius: 6px; font-size: 16px; cursor: pointer; transition: background 0.3s;">
                    Guardar
                </button>
            </div>
        </form>
    </div>

</div>
@endsection
