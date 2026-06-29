<x-supervisor-layout :title="'Supervisor Dashboard'">

    <p style="color: var(--muted); margin-bottom: 24px;">
        Welcome back, {{ auth()->user()->name }}. Your assigned interns and evaluation tools will appear here.
    </p>

    <div style="display: grid; grid-template-columns: repeat(auto-fit, minmax(200px, 1fr)); gap: 20px; max-width: 700px;">
        <div class="stat-card">
            <div class="num">0</div>
            <div class="label">Assigned Interns</div>
        </div>
        <div class="stat-card">
            <div class="num">0</div>
            <div class="label">Pending Evaluations</div>
        </div>
    </div>

</x-supervisor-layout>