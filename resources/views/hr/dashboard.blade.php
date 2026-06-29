<x-hr-layout :title="'HR Dashboard'">

    <p style="color: var(--muted); margin-bottom: 24px;">
        Welcome back, {{ auth()->user()->name }}. Application review and intern assignment tools will appear here.
    </p>

    <div style="display: grid; grid-template-columns: repeat(auto-fit, minmax(200px, 1fr)); gap: 20px; max-width: 700px;">
        <div class="stat-card">
            <div class="num">{{ \App\Models\User::where('role', 'intern')->count() }}</div>
            <div class="label">Registered Interns</div>
        </div>
        <div class="stat-card">
            <div class="num">{{ \App\Models\JobPosting::where('is_active', true)->count() }}</div>
            <div class="label">Active Postings</div>
        </div>
    </div>

</x-hr-layout>