<x-admin-layout :title="'Admin Dashboard'">

    <p style="color: var(--muted); margin-bottom: 24px;">
        Welcome back, {{ auth()->user()->name }}. Use the sidebar to manage users and job postings.
    </p>

    <div style="display: grid; grid-template-columns: repeat(auto-fit, minmax(200px, 1fr)); gap: 20px; max-width: 700px;">
        <div class="form-card" style="text-align: center;">
            <div style="font-size: 1.8rem; font-weight: 700; color: var(--judiciary-green-dark);">
                {{ \App\Models\User::count() }}
            </div>
            <div style="color: var(--muted); font-size: 0.85rem; margin-top: 4px;">Total Users</div>
        </div>

        <div class="form-card" style="text-align: center;">
            <div style="font-size: 1.8rem; font-weight: 700; color: var(--judiciary-green-dark);">
                {{ \App\Models\JobPosting::where('is_active', true)->count() }}
            </div>
            <div style="color: var(--muted); font-size: 0.85rem; margin-top: 4px;">Active Postings</div>
        </div>
    </div>

</x-admin-layout>