<x-intern-layout :title="'My Dashboard'">

    <p style="color: var(--muted); margin-bottom: 24px;">
        Welcome, {{ auth()->user()->name }}. Track your internship application status here once you've applied.
    </p>

    <div style="display: grid; grid-template-columns: repeat(auto-fit, minmax(200px, 1fr)); gap: 20px; max-width: 700px;">
        <div class="stat-card">
            <div class="num">—</div>
            <div class="label">Application Status</div>
        </div>
        <div class="stat-card">
            <div class="num">{{ auth()->user()->university ?? '—' }}</div>
            <div class="label">University</div>
        </div>
    </div>

</x-intern-layout>