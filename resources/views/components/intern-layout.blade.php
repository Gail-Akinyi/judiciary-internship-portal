<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $title ?? 'Intern' }} — JIMP</title>
    <style>
        :root {
            --judiciary-green: #26463b;
            --judiciary-green-dark: #16291f;
            --judiciary-gold: #cdb02e;
            --ink: #1c1c1c;
            --paper: #fbfaf7;
            --muted: #5c6b65;
            --line: #d8ddd9;
            --sidebar-width: 240px;
        }

        * { box-sizing: border-box; }

        body {
            margin: 0;
            font-family: -apple-system, "Segoe UI", Roboto, Helvetica, Arial, sans-serif;
            color: var(--ink);
            background: var(--paper);
        }

        .sidebar {
            position: fixed;
            top: 0;
            left: 0;
            width: var(--sidebar-width);
            height: 100vh;
            background: var(--judiciary-green);
            color: #fff;
            display: flex;
            flex-direction: column;
            padding: 28px 20px;
            overflow-y: auto;
        }

        .sidebar .brand {
            display: flex;
            flex-direction: column;
            align-items: center;
            text-align: center;
            margin-bottom: 32px;
        }

        .sidebar .brand .crest {
            width: 64px;
            height: 64px;
            object-fit: contain;
            margin-bottom: 12px;
        }

        .sidebar .brand .name {
            font-size: 0.98rem;
            font-weight: 700;
            line-height: 1.3;
        }

        .sidebar .brand .subname {
            font-size: 0.68rem;
            color: var(--judiciary-gold);
            text-transform: uppercase;
            letter-spacing: 0.1em;
            margin-top: 4px;
            font-weight: 600;
        }

        .sidebar nav {
            display: flex;
            flex-direction: column;
            gap: 4px;
        }

        .sidebar nav a {
            color: #e8ece9;
            text-decoration: none;
            font-size: 0.92rem;
            font-weight: 500;
            padding: 11px 14px;
            border-radius: 6px;
        }

        .sidebar nav a:hover { background: rgba(255,255,255,0.08); color: var(--judiciary-gold); }
        .sidebar nav a.active { background: rgba(205,176,46,0.16); color: var(--judiciary-gold); }

        .sidebar .sidebar-footer {
            margin-top: auto;
            padding-top: 16px;
        }

        .sidebar .sidebar-footer form button {
            width: 100%;
            background: rgba(255,255,255,0.08);
            border: 1px solid rgba(255,255,255,0.18);
            color: #fff;
            padding: 10px;
            border-radius: 6px;
            cursor: pointer;
            font-size: 0.85rem;
        }

        .sidebar .sidebar-footer form button:hover { background: rgba(255,255,255,0.15); }

        .main {
            margin-left: var(--sidebar-width);
            min-height: 100vh;
            display: flex;
            flex-direction: column;
        }

        .topbar {
            background: #fff;
            border-bottom: 1px solid var(--line);
            padding: 20px 36px;
            display: flex;
            align-items: center;
            justify-content: space-between;
        }

        .topbar h1 {
            font-size: 1.3rem;
            color: var(--judiciary-green-dark);
            margin: 0;
        }

        .topbar .user-pill { font-size: 0.85rem; color: var(--muted); }

        .content { padding: 32px 36px; flex: 1; }

        .alert {
            padding: 12px 16px;
            border-radius: 6px;
            margin-bottom: 20px;
            font-size: 0.92rem;
        }

        .alert-success { background: #e6f4ea; color: #1e6b34; border: 1px solid #b9e0c5; }
        .alert-error { background: #fdecea; color: #a32a2a; border: 1px solid #f3c2c0; }

        .btn {
            display: inline-block;
            padding: 10px 18px;
            border-radius: 5px;
            font-size: 0.9rem;
            font-weight: 600;
            text-decoration: none;
            border: none;
            cursor: pointer;
        }

        .btn-primary { background: var(--judiciary-green); color: #fff; }
        .btn-primary:hover { background: var(--judiciary-green-dark); }
        .btn-secondary { background: #fff; color: var(--judiciary-green-dark); border: 1px solid var(--line); }

        .stat-card {
            background: #fff;
            padding: 24px;
            border-radius: 8px;
            text-align: center;
            box-shadow: 0 1px 3px rgba(0,0,0,0.06);
        }

        .stat-card .num { font-size: 1.8rem; font-weight: 700; color: var(--judiciary-green-dark); }
        .stat-card .label { color: var(--muted); font-size: 0.85rem; margin-top: 4px; }
    </style>
</head>
<body>

    <aside class="sidebar">
        <div class="brand">
            <img src="{{ asset('images/judiciary-logo.png') }}" alt="Judiciary" class="crest">
            <div class="name">The Judiciary of Kenya</div>
            <div class="subname">Intern Panel</div>
        </div>
        <nav>
            <a href="{{ route('intern.dashboard') }}" class="{{ request()->routeIs('intern.dashboard') ? 'active' : '' }}">Dashboard</a>
        </nav>
        <div class="sidebar-footer">
            <form method="POST" action="{{ route('logout') }}">
                @csrf
                <button type="submit">Log out</button>
            </form>
        </div>
    </aside>

    <div class="main">
        <div class="topbar">
            <h1>{{ $title ?? 'HR' }}</h1>
            <div class="user-pill">{{ auth()->user()->name }}</div>
        </div>
        <div class="content">
            @if (session('status'))
                <div class="alert alert-success">{{ session('status') }}</div>
            @endif
            @if (session('error'))
                <div class="alert alert-error">{{ session('error') }}</div>
            @endif

            {{ $slot }}
        </div>
    </div>

</body>
</html>