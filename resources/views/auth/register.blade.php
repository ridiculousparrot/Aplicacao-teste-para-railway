@extends('layouts.app')
@section('title', 'Cadastro — Sistema Auth')

@section('content')
<div class="card">
    <div class="brand">
        <div class="brand-icon">✨</div>
        <h1>Criar conta</h1>
        <p>Preencha os dados abaixo para se registrar</p>
    </div>

    <form method="POST" action="{{ route('register.post') }}">
        @csrf

        <div class="form-group">
            <label for="name">Nome completo</label>
            <input
                type="text"
                id="name"
                name="name"
                value="{{ old('name') }}"
                placeholder="Seu nome"
                autocomplete="name"
                class="{{ $errors->has('name') ? 'is-error' : '' }}"
            >
            @error('name')
                <div class="field-error">{{ $message }}</div>
            @enderror
        </div>

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
            @error('email')
                <div class="field-error">{{ $message }}</div>
            @enderror
        </div>

        <div class="form-group">
            <label for="password">Senha</label>
            <input
                type="password"
                id="password"
                name="password"
                placeholder="Mínimo 6 caracteres"
                autocomplete="new-password"
                class="{{ $errors->has('password') ? 'is-error' : '' }}"
            >
            @error('password')
                <div class="field-error">{{ $message }}</div>
            @enderror
        </div>

        <div class="form-group">
            <label for="password_confirmation">Confirmar senha</label>
            <input
                type="password"
                id="password_confirmation"
                name="password_confirmation"
                placeholder="Repita a senha"
                autocomplete="new-password"
            >
        </div>

        <button type="submit" class="btn btn-primary">Criar conta</button>
    </form>

    <div class="card-footer">
        Já tem uma conta?
        <a href="{{ route('login') }}">Entrar</a>
    </div>
</div>
@endsection
