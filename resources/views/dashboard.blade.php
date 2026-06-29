<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Supervisor Dashboard</title>
</head>
<body style="font-family: sans-serif; padding: 40px;">
    <h1>Supervisor Dashboard</h1>
    <p>Logged in as: {{ auth()->user()->name }} ({{ auth()->user()->email }})</p>
    <p>Role: {{ auth()->user()->role }}</p>
    <form method="POST" action="{{ route('logout') }}">
        @csrf
        <button type="submit">Log out</button>
    </form>
</body>
</html>