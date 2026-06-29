<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register — Judiciary Internship Portal</title>
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

        .auth-wrap {
            width: 100%;
            max-width: 460px;
        }

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

        .auth-brand .name {
            font-size: 1.1rem;
            font-weight: 700;
            color: var(--judiciary-green-dark);
        }

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

        .auth-card h2 {
            margin: 0 0 6px;
            font-size: 1.2rem;
            color: var(--judiciary-green-dark);
        }

        .auth-card .sub {
            color: var(--muted);
            font-size: 0.88rem;
            margin-bottom: 22px;
        }

        .form-group { margin-bottom: 16px; }

        .form-group label {
            display: block;
            font-size: 0.84rem;
            font-weight: 600;
            margin-bottom: 6px;
            color: var(--judiciary-green-dark);
        }

        .form-group input,
.form-group select {
    width: 100%;
    padding: 10px 12px;
    border: 1px solid var(--line);
    border-radius: 5px;
    font-size: 0.92rem;
    font-family: inherit;
    background: #fff;
    color: var(--ink);
}

.form-group select {
    appearance: none;
    -webkit-appearance: none;
    background-image: url("data:image/svg+xml;charset=UTF-8,%3Csvg xmlns='http://www.w3.org/2000/svg' viewBox='0 0 24 24' fill='none' stroke='%2326463b' stroke-width='2' stroke-linecap='round' stroke-linejoin='round'%3E%3Cpolyline points='6 9 12 15 18 9'%3E%3C/polyline%3E%3C/svg%3E");
    background-repeat: no-repeat;
    background-position: right 12px center;
    background-size: 16px;
    padding-right: 36px;
    cursor: pointer;
}

.form-group input:focus,
.form-group select:focus {
    outline: none;
    border-color: var(--judiciary-green);
    box-shadow: 0 0 0 3px rgba(38,70,59,0.1);
}
        .form-group .error {
            color: #c0392b;
            font-size: 0.78rem;
            margin-top: 4px;
        }

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

        .auth-footer {
            text-align: center;
            margin-top: 18px;
            font-size: 0.86rem;
            color: var(--muted);
        }

        .auth-footer a {
            color: var(--judiciary-green-dark);
            font-weight: 600;
            text-decoration: none;
        }

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
            <h2>Create your account</h2>
            <p class="sub">Register as an intern to apply for internship placements.</p>

            <form method="POST" action="{{ route('register') }}">
                @csrf

                <div class="form-group">
                    <label for="name">Full Name</label>
                    <input id="name" type="text" name="name" value="{{ old('name') }}" required autofocus autocomplete="name">
                    @error('name') <div class="error">{{ $message }}</div> @enderror
                </div>

                <div class="form-group">
                    <label for="email">Email</label>
                    <input id="email" type="email" name="email" value="{{ old('email') }}" required autocomplete="username">
                    @error('email') <div class="error">{{ $message }}</div> @enderror
                </div>

                <div class="form-group">
                    <label for="phone">Phone Number</label>
                    <input id="phone" type="text" name="phone" value="{{ old('phone') }}" required autocomplete="tel">
                    @error('phone') <div class="error">{{ $message }}</div> @enderror
                </div>

                <div class="form-group">
    <label for="university">University / College</label>
    <select id="university" name="university" required onchange="toggleOther('university')">
        <option value="">Select your institution</option>
        <option value="University of Nairobi" @selected(old('university') === 'University of Nairobi')>University of Nairobi</option>
        <option value="Kenyatta University" @selected(old('university') === 'Kenyatta University')>Kenyatta University</option>
        <option value="Jomo Kenyatta University of Agriculture and Technology" @selected(old('university') === 'Jomo Kenyatta University of Agriculture and Technology')>Jomo Kenyatta University of Agriculture and Technology</option>
        <option value="Moi University" @selected(old('university') === 'Moi University')>Moi University</option>
        <option value="Egerton University" @selected(old('university') === 'Egerton University')>Egerton University</option>
        <option value="Maseno University" @selected(old('university') === 'Maseno University')>Maseno University</option>
        <option value="Technical University of Kenya" @selected(old('university') === 'Technical University of Kenya')>Technical University of Kenya</option>
        <option value="Strathmore University" @selected(old('university') === 'Strathmore University')>Strathmore University</option>
        <option value="Daystar University" @selected(old('university') === 'Daystar University')>Daystar University</option>
        <option value="United States International University - Africa" @selected(old('university') === 'United States International University - Africa')>United States International University - Africa</option>
        <option value="Other" @selected(old('university') && !in_array(old('university'), ['University of Nairobi','Kenyatta University','Jomo Kenyatta University of Agriculture and Technology','Moi University','Egerton University','Maseno University','Technical University of Kenya','Strathmore University','Daystar University','United States International University - Africa']))>Other (not listed)</option>
    </select>
    <input id="university_other" type="text" name="university_other" placeholder="Type your institution name" style="display:none; margin-top:8px;" value="{{ old('university_other') }}">
    @error('university') <div class="error">{{ $message }}</div> @enderror
</div>


                <div class="form-group">
    <label for="course">Course of Study</label>
    <select id="course" name="course" required onchange="toggleOther('course')">
        <option value="">Select your course</option>
        <option value="Bachelor of Laws (LLB)" @selected(old('course') === 'Bachelor of Laws (LLB)')>Bachelor of Laws (LLB)</option>
        <option value="Bachelor of Commerce" @selected(old('course') === 'Bachelor of Commerce')>Bachelor of Commerce</option>
        <option value="Bachelor of Business Administration" @selected(old('course') === 'Bachelor of Business Administration')>Bachelor of Business Administration</option>
        <option value="Bachelor of Science in Computer Science" @selected(old('course') === 'Bachelor of Science in Computer Science')>Bachelor of Science in Computer Science</option>
        <option value="Bachelor of Science in Information Technology" @selected(old('course') === 'Bachelor of Science in Information Technology')>Bachelor of Science in Information Technology</option>
        <option value="Bachelor of Arts in Criminology" @selected(old('course') === 'Bachelor of Arts in Criminology')>Bachelor of Arts in Criminology</option>
        <option value="Bachelor of Public Administration" @selected(old('course') === 'Bachelor of Public Administration')>Bachelor of Public Administration</option>
        <option value="Diploma in Law" @selected(old('course') === 'Diploma in Law')>Diploma in Law</option>
        <option value="Diploma in Information Communication Technology" @selected(old('course') === 'Diploma in Information Communication Technology')>Diploma in Information Communication Technology</option>
        <option value="Diploma in Business Management" @selected(old('course') === 'Diploma in Business Management')>Diploma in Business Management</option>
        <option value="Other" @selected(old('course') && !in_array(old('course'), ['Bachelor of Laws (LLB)','Bachelor of Commerce','Bachelor of Business Administration','Bachelor of Science in Computer Science','Bachelor of Science in Information Technology','Bachelor of Arts in Criminology','Bachelor of Public Administration','Diploma in Law','Diploma in Information Communication Technology','Diploma in Business Management']))>Other (not listed)</option>
    </select>
    <input id="course_other" type="text" name="course_other" placeholder="Type your course name" style="display:none; margin-top:8px;" value="{{ old('course_other') }}">
    @error('course') <div class="error">{{ $message }}</div> @enderror
</div>

                <div class="form-group">
                    <label for="password">Password</label>
                    <input id="password" type="password" name="password" required autocomplete="new-password">
                    @error('password') <div class="error">{{ $message }}</div> @enderror
                </div>

                <div class="form-group">
                    <label for="password_confirmation">Confirm Password</label>
                    <input id="password_confirmation" type="password" name="password_confirmation" required autocomplete="new-password">
                </div>

                <button type="submit" class="btn-submit">Create Account</button>
            </form>

            <div class="auth-footer">
                Already registered? <a href="{{ route('login') }}">Log in</a>
            </div>
        </div>

        <a href="{{ route('landing') }}" class="back-home">← Back to homepage</a>
    </div>
<script>
    function toggleOther(field) {
        const select = document.getElementById(field);
        const otherInput = document.getElementById(field + '_other');
        if (select.value === 'Other') {
            otherInput.style.display = 'block';
            otherInput.required = true;
        } else {
            otherInput.style.display = 'none';
            otherInput.required = false;
        }
    }
    document.addEventListener('DOMContentLoaded', function () {
        toggleOther('university');
        toggleOther('course');
    });
</script>

</body>
</html>