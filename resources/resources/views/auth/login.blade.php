@extends('layouts.app')
@section('title', 'Entrar — Sistema Auth')

@section('content')
<div class="card">
    <div class="brand">
        <div class="brand-icon">🔐</div>
        <h1>Bem-vindo</h1>
        <p>Acesse sua conta para continuar</p>
    </div>

    @if ($errors->has('email') && !$errors->has('name'))
        <div class="alert alert-error">{{ $errors->first('email') }}</div>
    @endif

    <form method="POST" action="{{ route('login.post') }}">
        @csrf

        <div class="form-group">
            <label for="email">E-mail</label>
            <input
                type="email"
                id="email"
                name="email"
                value="{{ old('email') }}"
                placeholder="seu@email.com"
                autocomplete="email"
                class="{{ $errors->has('email') ? 'is-error' : '' }}"
            >
        </div>

        <div class="form-group">
            <label for="password">Senha</label>
            <input
                type="password"
                id="password"
                name="password"
                placeholder="••••••••"
                autocomplete="current-password"
                class="{{ $errors->has('password') ? 'is-error' : '' }}"
            >
            @error('password')
                <div class="field-error">{{ $message }}</div>
            @enderror
        </div>

        <button type="submit" class="btn btn-primary">Entrar</button>
    </form>

    <div class="card-footer">
        Não tem uma conta?
        <a href="{{ route('register') }}">Cadastre-se</a>
    </div>
</div>
@endsection
