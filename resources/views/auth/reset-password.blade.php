<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Reset Password — Judiciary Internship Portal</title>
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

        .auth-card h2 { margin: 0 0 22px; font-size: 1.2rem; color: var(--judiciary-green-dark); }

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
            <h2>Reset your password</h2>

            <form method="POST" action="{{ route('password.store') }}">
                @csrf

                <input type="hidden" name="token" value="{{ $request->route('token') }}">

                <div class="form-group">
                    <label for="email">Email</label>
                    <input id="email" type="email" name="email" value="{{ old('email', $request->email) }}" required autofocus autocomplete="username">
                    @error('email') <div class="error">{{ $message }}</div> @enderror
                </div>

                <div class="form-group">
                    <label for="password">New Password</label>
                    <input id="password" type="password" name="password" required autocomplete="new-password">
                    @error('password') <div class="error">{{ $message }}</div> @enderror
                </div>

                <div class="form-group">
                    <label for="password_confirmation">Confirm New Password</label>
                    <input id="password_confirmation" type="password" name="password_confirmation" required autocomplete="new-password">
                </div>

                <button type="submit" class="btn-submit">Reset Password</button>
            </form>
        </div>
    </div>

</body>
</html>