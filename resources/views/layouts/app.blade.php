<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>@yield('title', 'Sistema Auth')</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link href="https://fonts.googleapis.com/css2?family=DM+Serif+Display:ital@0;1&family=DM+Sans:wght@300;400;500;600&display=swap" rel="stylesheet">
    <style>
        *, *::before, *::after { box-sizing: border-box; margin: 0; padding: 0; }

        :root {
            --bg:       #0d0f14;
            --surface:  #14171f;
            --border:   #1e2330;
            --accent:   #c8a96e;
            --accent2:  #e8c98e;
            --text:     #e8e4dc;
            --muted:    #6b7080;
            --danger:   #c0574a;
            --success:  #4a9e7a;
            --radius:   4px;
        }

        body {
            background-color: var(--bg);
            color: var(--text);
            font-family: 'DM Sans', sans-serif;
            font-size: 15px;
            min-height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
            padding: 24px;
            /* Subtle grid texture */
            background-image:
                linear-gradient(rgba(200,169,110,.03) 1px, transparent 1px),
                linear-gradient(90deg, rgba(200,169,110,.03) 1px, transparent 1px);
            background-size: 48px 48px;
        }

        /* ── Card ── */
        .card {
            background: var(--surface);
            border: 1px solid var(--border);
            border-radius: var(--radius);
            width: 100%;
            max-width: 420px;
            padding: 48px 40px;
            position: relative;
            box-shadow: 0 0 80px rgba(0,0,0,.6), 0 0 0 1px rgba(200,169,110,.06);
            animation: fadeUp .45s cubic-bezier(.22,1,.36,1) both;
        }

        .card::before {
            content: '';
            position: absolute;
            top: 0; left: 40px; right: 40px;
            height: 1px;
            background: linear-gradient(90deg, transparent, var(--accent), transparent);
            opacity: .6;
        }

        @keyframes fadeUp {
            from { opacity:0; transform: translateY(18px); }
            to   { opacity:1; transform: translateY(0); }
        }

        /* ── Logo / Header ── */
        .brand {
            text-align: center;
            margin-bottom: 36px;
        }

        .brand-icon {
            width: 48px; height: 48px;
            border: 1px solid var(--border);
            border-radius: var(--radius);
            margin: 0 auto 16px;
            display: flex; align-items: center; justify-content: center;
            font-size: 20px;
            background: rgba(200,169,110,.06);
        }

        .brand h1 {
            font-family: 'DM Serif Display', serif;
            font-size: 24px;
            font-weight: 400;
            letter-spacing: .02em;
            color: var(--text);
        }

        .brand p {
            margin-top: 6px;
            color: var(--muted);
            font-size: 13px;
            font-weight: 300;
        }

        /* ── Form ── */
        .form-group {
            margin-bottom: 18px;
        }

        label {
            display: block;
            font-size: 12px;
            font-weight: 500;
            letter-spacing: .08em;
            text-transform: uppercase;
            color: var(--muted);
            margin-bottom: 8px;
        }

        input[type="text"],
        input[type="email"],
        input[type="password"] {
            width: 100%;
            background: var(--bg);
            border: 1px solid var(--border);
            border-radius: var(--radius);
            padding: 11px 14px;
            color: var(--text);
            font-family: 'DM Sans', sans-serif;
            font-size: 14px;
            outline: none;
            transition: border-color .2s, box-shadow .2s;
        }

        input:focus {
            border-color: var(--accent);
            box-shadow: 0 0 0 3px rgba(200,169,110,.1);
        }

        input.is-error { border-color: var(--danger); }

        .field-error {
            color: var(--danger);
            font-size: 12px;
            margin-top: 5px;
        }

        /* ── Button ── */
        .btn {
            display: block;
            width: 100%;
            padding: 12px;
            border: none;
            border-radius: var(--radius);
            font-family: 'DM Sans', sans-serif;
            font-size: 14px;
            font-weight: 500;
            letter-spacing: .04em;
            cursor: pointer;
            transition: opacity .2s, transform .15s;
        }
        .btn:active { transform: scale(.98); }

        .btn-primary {
            background: var(--accent);
            color: #0d0f14;
        }
        .btn-primary:hover { opacity: .88; }

        .btn-ghost {
            background: transparent;
            border: 1px solid var(--border);
            color: var(--text);
            margin-top: 10px;
        }
        .btn-ghost:hover { border-color: var(--accent); color: var(--accent); }

        /* ── Alert ── */
        .alert {
            padding: 11px 14px;
            border-radius: var(--radius);
            font-size: 13px;
            margin-bottom: 20px;
            border-left: 3px solid;
        }
        .alert-error   { background: rgba(192,87,74,.08); border-color: var(--danger); color: #e8887e; }
        .alert-success { background: rgba(74,158,122,.08); border-color: var(--success); color: #7ecfb0; }

        /* ── Footer link ── */
        .card-footer {
            margin-top: 28px;
            text-align: center;
            font-size: 13px;
            color: var(--muted);
        }
        .card-footer a {
            color: var(--accent);
            text-decoration: none;
            font-weight: 500;
        }
        .card-footer a:hover { color: var(--accent2); }

        /* ── Divider ── */
        .divider {
            border: none;
            border-top: 1px solid var(--border);
            margin: 28px 0;
        }

        /* ── Dashboard specific ── */
        .dash-header {
            display: flex;
            align-items: center;
            justify-content: space-between;
            margin-bottom: 28px;
        }

        .user-badge {
            display: flex;
            align-items: center;
            gap: 12px;
        }

        .avatar {
            width: 40px; height: 40px;
            border-radius: var(--radius);
            background: rgba(200,169,110,.12);
            border: 1px solid var(--border);
            display: flex; align-items: center; justify-content: center;
            font-family: 'DM Serif Display', serif;
            font-size: 17px;
            color: var(--accent);
        }

        .user-info small {
            display: block;
            font-size: 11px;
            color: var(--muted);
            text-transform: uppercase;
            letter-spacing: .08em;
        }
        .user-info strong {
            font-weight: 500;
            font-size: 14px;
        }

        .status-pill {
            display: inline-flex;
            align-items: center;
            gap: 6px;
            background: rgba(74,158,122,.1);
            border: 1px solid rgba(74,158,122,.2);
            border-radius: 99px;
            padding: 4px 12px;
            font-size: 12px;
            color: #7ecfb0;
            margin: 20px 0 28px;
        }
        .status-pill span { width:6px; height:6px; border-radius:50%; background: var(--success); display:inline-block; animation: pulse 2s infinite; }

        @keyframes pulse {
            0%, 100% { opacity:1; }
            50%       { opacity:.4; }
        }
    </style>
    @stack('styles')
</head>
<body>
    @yield('content')
</body>
</html>
