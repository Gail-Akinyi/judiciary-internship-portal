<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Log in — Judiciary Internship Portal</title>
    <style>
        :root {
            --judiciary-green: #26463b;
            --judiciary-green-dark: #16291f;
            --judiciary-gold: #cdb02e;
            --ink: #1c1c1c;
            --paper: #fbfaf7;
            --muted: #5c6b65;
            --line: #d8ddd9;
        }

        * { box-sizing: border-box; }

        body {
            margin: 0;
            font-family: -apple-system, "Segoe UI", Roboto, Helvetica, Arial, sans-serif;
            background: var(--paper);
            color: var(--ink);
            min-height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
            padding: 40px 16px;
        }

        .auth-wrap { width: 100%; max-width: 420px; }

        .auth-brand {
            display: flex;
            flex-direction: column;
            align-items: center;
            text-align: center;
            margin-bottom: 28px;
        }

        .auth-brand .crest {
            width: 72px;
            height: 72px;
            object-fit: contain;
            margin-bottom: 12px;
        }

        .auth-brand .name { font-size: 1.1rem; font-weight: 700; color: var(--judiciary-green-dark); }

        .auth-brand .subname {
            font-size: 0.74rem;
            color: var(--judiciary-gold);
            text-transform: uppercase;
            letter-spacing: 0.1em;
            font-weight: 700;
            margin-top: 4px;
        }

        .auth-card {
            background: #fff;
            border-radius: 10px;
            padding: 32px 32px 28px;
            box-shadow: 0 2px 10px rgba(0,0,0,0.06);
            border: 1px solid var(--line);
        }

        .auth-card h2 { margin: 0 0 6px; font-size: 1.2rem; color: var(--judiciary-green-dark); }
        .auth-card .sub { color: var(--muted); font-size: 0.88rem; margin-bottom: 22px; }

        .status-msg {
            background: #e6f4ea;
            color: #1e6b34;
            border: 1px solid #b9e0c5;
            padding: 10px 14px;
            border-radius: 6px;
            font-size: 0.85rem;
            margin-bottom: 18px;
        }

        .form-group { margin-bottom: 16px; }

        .form-group label {
            display: block;
            font-size: 0.84rem;
            font-weight: 600;
            margin-bottom: 6px;
            color: var(--judiciary-green-dark);
        }

        .form-group input {
            width: 100%;
            padding: 10px 12px;
            border: 1px solid var(--line);
            border-radius: 5px;
            font-size: 0.92rem;
            font-family: inherit;
        }

        .form-group input:focus {
            outline: none;
            border-color: var(--judiciary-green);
            box-shadow: 0 0 0 3px rgba(38,70,59,0.1);
        }

        .form-group .error { color: #c0392b; font-size: 0.78rem; margin-top: 4px; }

        .row-between {
            display: flex;
            align-items: center;
            justify-content: space-between;
            margin: 14px 0 20px;
            font-size: 0.85rem;
        }

        .row-between label { display: flex; align-items: center; gap: 6px; color: var(--muted); font-weight: 400; }
        .row-between a { color: var(--judiciary-green-dark); text-decoration: none; font-weight: 600; }
        .row-between a:hover { color: var(--judiciary-green); }

        .btn-submit {
            width: 100%;
            background: var(--judiciary-green);
            color: #fff;
            border: none;
            padding: 12px;
            border-radius: 5px;
            font-size: 0.95rem;
            font-weight: 600;
            cursor: pointer;
        }

        .btn-submit:hover { background: var(--judiciary-green-dark); }

        .auth-footer { text-align: center; margin-top: 18px; font-size: 0.86rem; color: var(--muted); }
        .auth-footer a { color: var(--judiciary-green-dark); font-weight: 600; text-decoration: none; }
        .auth-footer a:hover { color: var(--judiciary-green); }

        .back-home {
            display: block;
            text-align: center;
            margin-top: 20px;
            font-size: 0.82rem;
            color: var(--muted);
            text-decoration: none;
        }

        .back-home:hover { color: var(--judiciary-green-dark); }
    </style>
</head>
<body>

    <div class="auth-wrap">
        <div class="auth-brand">
            <img src="{{ asset('images/judiciary-logo.png') }}" alt="The Judiciary of Kenya" class="crest">
            <div class="name">The Judiciary of Kenya</div>
            <div class="subname">Internship Portal</div>
        </div>

        <div class="auth-card">
            <h2>Welcome back</h2>
            <p class="sub">Log in to access your dashboard.</p>

            @if (session('status'))
                <div class="status-msg">{{ session('status') }}</div>
            @endif

            <form method="POST" action="{{ route('login') }}">
                @csrf

                <div class="form-group">
                    <label for="email">Email</label>
                    <input id="email" type="email" name="email" value="{{ old('email') }}" required autofocus autocomplete="username">
                    @error('email') <div class="error">{{ $message }}</div> @enderror
                </div>

                <div class="form-group">
                    <label for="password">Password</label>
                    <input id="password" type="password" name="password" required autocomplete="current-password">
                    @error('password') <div class="error">{{ $message }}</div> @enderror
                </div>

                <div class="row-between">
                    <label for="remember">
                        <input id="remember" type="checkbox" name="remember">
                        Remember me
                    </label>
                    @if (Route::has('password.request'))
                        <a href="{{ route('password.request') }}">Forgot password?</a>
                    @endif
                </div>

                <button type="submit" class="btn-submit">Log in</button>
            </form>

            <div class="auth-footer">
                Don't have an account? <a href="{{ route('register') }}">Register</a>
            </div>
        </div>

        <a href="{{ route('landing') }}" class="back-home">← Back to homepage</a>
    </div>

</body>
</html>