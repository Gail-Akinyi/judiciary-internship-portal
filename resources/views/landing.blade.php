<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Judiciary Internship Management Portal</title>
    <style>
        :root {
            --judiciary-green: #26463b;
            --judiciary-green-dark: #16291f;
            --judiciary-gold: #cdb02e;
            --ink: #1c1c1c;
            --paper: #fbfaf7;
            --muted: #5c6b65;
            --line: #d8ddd9;
            --sidebar-width: 220px;
        }

        * { box-sizing: border-box; }

        body {
            margin: 0;
            font-family: -apple-system, "Segoe UI", Roboto, Helvetica, Arial, sans-serif;
            color: var(--ink);
            background: var(--paper);
        }

        /* ---------- SIDEBAR ---------- */
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
            padding: 32px 20px;
        }

        .sidebar .brand {
            display: flex;
            flex-direction: column;
            align-items: center;
            text-align: center;
            margin-bottom: 36px;
        }

        .sidebar .brand .crest {
            width: 76px;
            height: 76px;
            object-fit: contain;
            margin-bottom: 14px;
        }

        .sidebar .brand .name {
            font-size: 1.02rem;
            font-weight: 700;
            line-height: 1.35;
        }

        .sidebar .brand .subname {
            font-size: 0.7rem;
            color: var(--judiciary-gold);
            text-transform: uppercase;
            letter-spacing: 0.1em;
            margin-top: 6px;
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
            font-size: 0.9rem;
            font-weight: 500;
            padding: 11px 14px;
            border-radius: 6px;
        }

        .sidebar nav a:hover { background: rgba(255,255,255,0.08); color: var(--judiciary-gold); }
        .sidebar nav a.active { background: rgba(205,176,46,0.16); color: var(--judiciary-gold); }

        .sidebar .sidebar-footer {
            margin-top: auto;
            font-size: 0.7rem;
            color: rgba(255,255,255,0.5);
            text-align: center;
        }

        /* ---------- MAIN ---------- */
        .main {
            margin-left: var(--sidebar-width);
            min-height: 100vh;
            display: flex;
            flex-direction: column;
        }

        /* TOP NAV */
        .topnav {
            background: #fff;
            border-bottom: 1px solid var(--line);
            padding: 16px 48px;
            display: flex;
            align-items: center;
            justify-content: flex-end;
            gap: 24px;
        }

        .topnav a {
            text-decoration: none;
            font-size: 0.92rem;
            font-weight: 600;
        }

        .topnav a.nav-login { color: var(--judiciary-green-dark); }
        .topnav a.nav-register {
            background: var(--judiciary-green);
            color: #fff;
            padding: 9px 18px;
            border-radius: 5px;
        }
        .topnav a.nav-register:hover { background: var(--judiciary-green-dark); }

        .hero {
            padding: 56px 48px 40px;
            max-width: 800px;
        }

        .hero .eyebrow {
            color: var(--judiciary-green);
            text-transform: uppercase;
            font-size: 0.76rem;
            letter-spacing: 0.13em;
            font-weight: 700;
            margin-bottom: 12px;
        }

        .hero h1 {
            font-size: 2.2rem;
            line-height: 1.22;
            margin: 0 0 16px;
            color: var(--judiciary-green-dark);
        }

        .hero p.lead {
            font-size: 1.04rem;
            color: var(--muted);
            line-height: 1.6;
            max-width: 620px;
        }

        /* JOB POSTINGS */
        section.postings {
            background: #fff;
            border-top: 1px solid var(--line);
            padding: 48px 48px;
            flex: 1;
        }

        section.postings h2 {
            font-size: 1.3rem;
            color: var(--judiciary-green-dark);
            margin: 0 0 24px;
        }

        .posting-grid {
            display: grid;
            grid-template-columns: repeat(auto-fill, minmax(280px, 1fr));
            gap: 20px;
            max-width: 1000px;
        }

        .posting-card {
            border: 1px solid var(--line);
            border-radius: 8px;
            padding: 22px;
            background: var(--paper);
        }

        .posting-card h3 {
            margin: 0 0 6px;
            font-size: 1.05rem;
            color: var(--judiciary-green-dark);
        }

        .posting-card .dept {
            font-size: 0.78rem;
            color: var(--judiciary-gold);
            text-transform: uppercase;
            letter-spacing: 0.06em;
            font-weight: 700;
            margin-bottom: 10px;
        }

        .posting-card p.desc {
            font-size: 0.88rem;
            color: var(--muted);
            line-height: 1.5;
            margin: 0 0 14px;
        }

        .posting-card .deadline {
            font-size: 0.8rem;
            color: var(--muted);
            margin-bottom: 14px;
        }

        .posting-card .apply-link {
            display: inline-block;
            font-size: 0.86rem;
            font-weight: 600;
            color: #fff;
            background: var(--judiciary-green);
            padding: 8px 16px;
            border-radius: 5px;
            text-decoration: none;
        }

        .posting-card .apply-link:hover { background: var(--judiciary-green-dark); }

        .empty-state {
            color: var(--muted);
            font-size: 0.92rem;
            padding: 24px 0;
        }

        footer {
            text-align: center;
            padding: 24px 16px;
            color: var(--muted);
            font-size: 0.8rem;
            background: #fff;
            border-top: 1px solid var(--line);
        }

        @media (max-width: 900px) {
            :root { --sidebar-width: 0px; }
            .sidebar { display: none; }
            .main { margin-left: 0; }
        }

        @media (max-width: 600px) {
            .topnav { padding: 14px 20px; }
            .hero { padding: 36px 20px; }
            section.postings { padding: 32px 20px; }
        }
    </style>
</head>
<body>

    <aside class="sidebar">
        <div class="brand">
            <img src="{{ asset('images/judiciary-logo.png') }}" alt="The Judiciary of Kenya" class="crest">
            <div class="name">The Judiciary of Kenya</div>
            <div class="subname">Internship Portal</div>
        </div>
        <nav>
            <a href="{{ route('landing') }}" class="active">Home</a>
            <a href="#postings">Available Jobs</a>
        </nav>
        <div class="sidebar-footer">
            &copy; {{ date('Y') }} The Judiciary of Kenya
        </div>
    </aside>

    <div class="main">
        <div class="topnav">
            <a href="{{ route('login') }}" class="nav-login">Login</a>
            <a href="{{ route('register') }}" class="nav-register">Register</a>
        </div>

        <section class="hero">
            <div class="eyebrow">Internship &amp; Attachment Program</div>
            <h1>Build your career inside the institution that upholds justice in Kenya.</h1>
            <p class="lead">
                Apply for internship and attachment placements online, track your application status,
                and receive your completion certificate digitally — from submission to sign-off.
            </p>
        </section>

        <section class="postings" id="postings">
            <h2>Available Internship Postings</h2>

            @if ($postings->isEmpty())
                <p class="empty-state">There are no open internship postings at the moment. Please check back soon.</p>
            @else
                <div class="posting-grid">
                    @foreach ($postings as $posting)
                        <div class="posting-card">
                            <h3>{{ $posting->title }}</h3>
                            @if ($posting->department)
                                <div class="dept">{{ $posting->department }}</div>
                            @endif
                            <p class="desc">{{ \Illuminate\Support\Str::limit($posting->description, 110) }}</p>
                            @if ($posting->application_deadline)
                                <div class="deadline">Apply by {{ $posting->application_deadline->format('d M Y') }}</div>
                            @endif
                            <a href="{{ route('register') }}" class="apply-link">Apply Now</a>
                        </div>
                    @endforeach
                </div>
            @endif
        </section>

        <footer>
            &copy; {{ date('Y') }} The Judiciary of Kenya — Internship Management Portal
        </footer>
    </div>

</body>
</html>