<x-admin-layout :title="'Manage Users'">

    <div class="actions-bar">
        <form method="GET" action="{{ route('admin.users.index') }}" class="filter-form">
            <input type="text" name="search" placeholder="Search name or email" value="{{ $search }}">
            <select name="role" onchange="this.form.submit()">
                <option value="">All roles</option>
                <option value="admin" @selected($roleFilter === 'admin')>Admin</option>
                <option value="hr_officer" @selected($roleFilter === 'hr_officer')>HR Officer</option>
                <option value="supervisor" @selected($roleFilter === 'supervisor')>Supervisor</option>
                <option value="intern" @selected($roleFilter === 'intern')>Intern</option>
            </select>
            <button type="submit" class="btn btn-secondary">Filter</button>
        </form>
        <a href="{{ route('admin.users.create') }}" class="btn btn-primary">+ Add User</a>
    </div>

    <table>
        <thead>
            <tr>
                <th>Name</th>
                <th>Email</th>
                <th>Role</th>
                <th>Status</th>
                <th>Joined</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @forelse ($users as $user)
                <tr>
                    <td>{{ $user->name }}</td>
                    <td>{{ $user->email }}</td>
                    <td><span class="badge badge-{{ $user->role }}">{{ str($user->role)->replace('_', ' ')->title() }}</span></td>
                    <td>
                        <span class="badge {{ $user->is_active ? 'badge-active' : 'badge-inactive' }}">
                            {{ $user->is_active ? 'Active' : 'Inactive' }}
                        </span>
                    </td>
                    <td>{{ $user->created_at->format('d M Y') }}</td>
                    <td style="display:flex; gap:8px;">
                        <a href="{{ route('admin.users.edit', $user) }}" class="btn btn-secondary" style="padding:6px 12px; font-size:0.8rem;">Edit</a>
                        @if ($user->id !== auth()->id())
                            <form method="POST" action="{{ route('admin.users.destroy', $user) }}" onsubmit="return confirm('Delete {{ $user->name }}? This cannot be undone.');">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger" style="padding:6px 12px; font-size:0.8rem;">Delete</button>
                            </form>
                        @endif
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="6" style="text-align:center; color:var(--muted); padding:24px;">No users found.</td>
                </tr>
            @endforelse
        </tbody>
    </table>

    <div style="margin-top: 20px;">
        {{ $users->links() }}
    </div>

</x-admin-layout>