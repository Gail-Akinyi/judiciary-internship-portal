<x-admin-layout :title="'Edit Job Posting'">

    <div class="form-card">
        <form method="POST" action="{{ route('admin.postings.update', $posting) }}">
            @csrf
            @method('PUT')

            <div class="form-group">
                <label for="title">Title</label>
                <input type="text" id="title" name="title" value="{{ old('title', $posting->title) }}" required autofocus>
                @error('title') <div class="error">{{ $message }}</div> @enderror
            </div>

            <div class="form-group">
                <label for="department">Department (optional)</label>
                <input type="text" id="department" name="department" value="{{ old('department', $posting->department) }}">
                @error('department') <div class="error">{{ $message }}</div> @enderror
            </div>

            <div class="form-group">
                <label for="description">Description</label>
                <textarea id="description" name="description" rows="5" required style="width:100%; padding:10px 12px; border:1px solid var(--line); border-radius:5px; font-size:0.92rem; font-family:inherit;">{{ old('description', $posting->description) }}</textarea>
                @error('description') <div class="error">{{ $message }}</div> @enderror
            </div>

            <div class="form-group">
                <label for="application_deadline">Application Deadline (optional)</label>
                <input type="date" id="application_deadline" name="application_deadline" value="{{ old('application_deadline', $posting->application_deadline?->format('Y-m-d')) }}">
                @error('application_deadline') <div class="error">{{ $message }}</div> @enderror
            </div>

            <div class="form-group">
                <label for="is_active">Status</label>
                <select id="is_active" name="is_active" required>
                    <option value="1" @selected(old('is_active', (int) $posting->is_active) === 1)>Active (visible on homepage)</option>
                    <option value="0" @selected(old('is_active', (int) $posting->is_active) === 0)>Inactive (hidden)</option>
                </select>
            </div>

            <div style="display:flex; gap:10px; margin-top: 24px;">
                <button type="submit" class="btn btn-primary">Save Changes</button>
                <a href="{{ route('admin.postings.index') }}" class="btn btn-secondary">Cancel</a>
            </div>
        </form>
    </div>

</x-admin-layout>