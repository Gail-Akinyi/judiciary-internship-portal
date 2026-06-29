<x-admin-layout :title="'Edit User'">

    <div class="form-card">
        <form method="POST" action="{{ route('admin.users.update', $user) }}">
            @csrf
            @method('PUT')

            <div class="form-group">
                <label for="name">Full Name</label>
                <input type="text" id="name" name="name" value="{{ old('name', $user->name) }}" required autofocus>
                @error('name') <div class="error">{{ $message }}</div> @enderror
            </div>

            <div class="form-group">
                <label for="email">Email</label>
                <input type="email" id="email" name="email" value="{{ old('email', $user->email) }}" required>
                @error('email') <div class="error">{{ $message }}</div> @enderror
            </div>

            <div class="form-group">
                <label for="phone">Phone</label>
                <input type="text" id="phone" name="phone" value="{{ old('phone', $user->phone) }}">
                @error('phone') <div class="error">{{ $message }}</div> @enderror
            </div>

            <div class="form-group">
                <label for="role">Role</label>
                <select id="role" name="role" required>
                    <option value="admin" @selected(old('role', $user->role) === 'admin')>Admin</option>
                    <option value="hr_officer" @selected(old('role', $user->role) === 'hr_officer')>HR Officer</option>
                    <option value="supervisor" @selected(old('role', $user->role) === 'supervisor')>Supervisor</option>
                    <option value="intern" @selected(old('role', $user->role) === 'intern')>Intern</option>
                </select>
                @error('role') <div class="error">{{ $message }}</div> @enderror
            </div>

            <div class="form-group">
                <label for="is_active">Status</label>
                <select id="is_active" name="is_active" required>
                    <option value="1" @selected(old('is_active', (int) $user->is_active) === 1)>Active</option>
                    <option value="0" @selected(old('is_active', (int) $user->is_active) === 0)>Inactive</option>
                </select>
            </div>

            <div class="form-group">
                <label for="password">New Password</label>
                <input type="password" id="password" name="password">
                <div class="hint">Leave blank to keep the current password.</div>
                @error('password') <div class="error">{{ $message }}</div> @enderror
            </div>

            <div class="form-group">
                <label for="password_confirmation">Confirm New Password</label>
                <input type="password" id="password_confirmation" name="password_confirmation">
            </div>

            <div style="display:flex; gap:10px; margin-top: 24px;">
                <button type="submit" class="btn btn-primary">Save Changes</button>
                <a href="{{ route('admin.users.index') }}" class="btn btn-secondary">Cancel</a>
            </div>
        </form>
    </div>

</x-admin-layout>