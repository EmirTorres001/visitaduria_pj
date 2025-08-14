@extends('layouts.app')

@section('content')
<div style="display: flex; justify-content: center; align-items: center; min-height: 80vh;">
    <div style="width: 400px; background: #f7f7f7; padding: 30px; border-radius: 10px; box-shadow: 0 4px 10px rgba(0,0,0,0.1);">
        <h2 style="text-align:center; margin-bottom: 20px;">Registro</h2>

        @if ($errors->any())
            <div style="color: red; margin-bottom: 10px;">
                @foreach ($errors->all() as $error)
                    <p>⚠ {{ $error }}</p>
                @endforeach
            </div>
        @endif

        <form method="POST" action="{{ route('register') }}">
            @csrf

            <div style="margin-bottom: 15px;">
                <label>Nombre</label>
                <input type="text" name="name" value="{{ old('name') }}" required
                    style="width: 100%; padding: 10px; border-radius: 5px; border: 1px solid #ccc;">
            </div>

            <div style="margin-bottom: 15px;">
                <label>Email</label>
                <input type="email" name="email" value="{{ old('email') }}" required
                    style="width: 100%; padding: 10px; border-radius: 5px; border: 1px solid #ccc;">
            </div>

            <div style="margin-bottom: 15px;">
                <label>Contraseña</label>
                <input type="password" name="password" required
                    style="width: 100%; padding: 10px; border-radius: 5px; border: 1px solid #ccc;">
            </div>

            <div style="margin-bottom: 15px;">
                <label>Confirmar Contraseña</label>
                <input type="password" name="password_confirmation" required
                    style="width: 100%; padding: 10px; border-radius: 5px; border: 1px solid #ccc;">
            </div>

            <button type="submit"
                style="width: 100%; padding: 10px; background-color: #21584F; color: white; border: none; border-radius: 5px;">
                Registrarse
            </button>
        </form>

        <p style="text-align:center; margin-top: 15px;">
            ¿Ya tienes cuenta? <a href="{{ route('login') }}" style="color:#21584F;">Inicia sesión</a>
        </p>
    </div>
</div>
@endsection
