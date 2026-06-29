<x-admin-layout :title="'Add New User'">

    <div class="form-card">
        <form method="POST" action="{{ route('admin.users.store') }}">
            @csrf

            <div class="form-group">
                <label for="name">Full Name</label>
                <input type="text" id="name" name="name" value="{{ old('name') }}" required autofocus>
                @error('name') <div class="error">{{ $message }}</div> @enderror
            </div>

            <div class="form-group">
                <label for="email">Email</label>
                <input type="email" id="email" name="email" value="{{ old('email') }}" required>
                @error('email') <div class="error">{{ $message }}</div> @enderror
            </div>

            <div class="form-group">
                <label for="phone">Phone (optional)</label>
                <input type="text" id="phone" name="phone" value="{{ old('phone') }}">
                @error('phone') <div class="error">{{ $message }}</div> @enderror
            </div>

            <div class="form-group">
                <label for="role">Role</label>
                <select id="role" name="role" required>
                    <option value="">Select a role</option>
                    <option value="admin" @selected(old('role') === 'admin')>Admin</option>
                    <option value="hr_officer" @selected(old('role') === 'hr_officer')>HR Officer</option>
                    <option value="supervisor" @selected(old('role') === 'supervisor')>Supervisor</option>
                </select>
                <div class="hint">Interns register themselves via the public Register page.</div>
                @error('role') <div class="error">{{ $message }}</div> @enderror
            </div>

            <div class="form-group">
                <label for="password">Password</label>
                <input type="password" id="password" name="password" required>
                @error('password') <div class="error">{{ $message }}</div> @enderror
            </div>

            <div class="form-group">
                <label for="password_confirmation">Confirm Password</label>
                <input type="password" id="password_confirmation" name="password_confirmation" required>
            </div>

            <div style="display:flex; gap:10px; margin-top: 24px;">
                <button type="submit" class="btn btn-primary">Create User</button>
                <a href="{{ route('admin.users.index') }}" class="btn btn-secondary">Cancel</a>
            </div>
        </form>
    </div>

</x-admin-layout>