@extends('layouts.app')
@section('title', 'Painel — Sistema Auth')

@section('content')
<div class="card">
    <div class="dash-header">
        <div class="user-badge">
            <div class="avatar">{{ strtoupper(substr($user->name, 0, 1)) }}</div>
            <div class="user-info">
                <small>Logado como</small>
                <strong>{{ $user->name }}</strong>
            </div>
        </div>
    </div>

    <hr class="divider" style="margin-top:0">

    <div class="status-pill">
        <span></span>
        Sessão ativa
    </div>

    <p style="color:var(--muted); font-size:13px; line-height:1.7; margin-bottom:8px;">
        Você está autenticado com o e-mail <strong style="color:var(--text)">{{ $user->email }}</strong>.
        Sua conta foi registrada em <strong style="color:var(--text)">{{ $user->created_at->format('d/m/Y') }}</strong>.
    </p>

    <hr class="divider">

    <form method="POST" action="{{ route('logout') }}">
        @csrf
        <button type="submit" class="btn btn-ghost">
            ← Sair da conta
        </button>
    </form>
</div>
@endsection
