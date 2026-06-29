<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Forgot Password — Judiciary Internship Portal</title>
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

        .auth-brand .crest { width: 72px; height: 72px; object-fit: contain; margin-bottom: 12px; }
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
        .auth-card .sub { color: var(--muted); font-size: 0.88rem; margin-bottom: 22px; line-height: 1.5; }

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
            margin-top: 8px;
        }

        .btn-submit:hover { background: var(--judiciary-green-dark); }

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
            <h2>Forgot your password?</h2>
            <p class="sub">No problem. Enter your email and we'll send you a link to reset it.</p>

            @if (session('status'))
                <div class="status-msg">{{ session('status') }}</div>
            @endif

            <form method="POST" action="{{ route('password.email') }}">
                @csrf

                <div class="form-group">
                    <label for="email">Email</label>
                    <input id="email" type="email" name="email" value="{{ old('email') }}" required autofocus>
                    @error('email') <div class="error">{{ $message }}</div> @enderror
                </div>

                <button type="submit" class="btn-submit">Send Reset Link</button>
            </form>
        </div>

        <a href="{{ route('login') }}" class="back-home">← Back to login</a>
    </div>

</body>
</html>