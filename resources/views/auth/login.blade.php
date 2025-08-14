@extends('layouts.app')

@section('content')
<div style="display: flex; justify-content: center; align-items: center; min-height: 80vh;">
    <div style="width: 400px; background: #f7f7f7; padding: 30px; border-radius: 10px; box-shadow: 0 4px 10px rgba(0,0,0,0.1);">
        <h2 style="text-align:center; margin-bottom: 20px;">Iniciar Sesión</h2>

        @if ($errors->any())
            <div style="color: red; margin-bottom: 10px;">
                @foreach ($errors->all() as $error)
                    <p>⚠ {{ $error }}</p>
                @endforeach
            </div>
        @endif

        <form method="POST" action="{{ route('login') }}">
            @csrf

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

            <button type="submit"
                style="width: 100%; padding: 10px; background-color: #21584F; color: white; border: none; border-radius: 5px;">
                Iniciar Sesión
            </button>
        </form>

        <p style="text-align:center; margin-top: 15px;">
            ¿No tienes cuenta? <a href="{{ route('register') }}" style="color:#21584F;">Regístrate</a>
        </p>
    </div>
</div>
@endsection
