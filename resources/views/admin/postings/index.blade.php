<x-admin-layout :title="'Manage Job Postings'">

    <div class="actions-bar">
        <div></div>
        <a href="{{ route('admin.postings.create') }}" class="btn btn-primary">+ Add Posting</a>
    </div>

    <table>
        <thead>
            <tr>
                <th>Title</th>
                <th>Department</th>
                <th>Deadline</th>
                <th>Status</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @forelse ($postings as $posting)
                <tr>
                    <td>{{ $posting->title }}</td>
                    <td>{{ $posting->department ?? '—' }}</td>
                    <td>{{ $posting->application_deadline?->format('d M Y') ?? '—' }}</td>
                    <td>
                        <span class="badge {{ $posting->is_active ? 'badge-active' : 'badge-inactive' }}">
                            {{ $posting->is_active ? 'Active' : 'Inactive' }}
                        </span>
                    </td>
                    <td style="display:flex; gap:8px;">
                        <a href="{{ route('admin.postings.edit', $posting) }}" class="btn btn-secondary" style="padding:6px 12px; font-size:0.8rem;">Edit</a>
                        <form method="POST" action="{{ route('admin.postings.destroy', $posting) }}" onsubmit="return confirm('Delete this posting?');">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger" style="padding:6px 12px; font-size:0.8rem;">Delete</button>
                        </form>
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="5" style="text-align:center; color:var(--muted); padding:24px;">No job postings yet.</td>
                </tr>
            @endforelse
        </tbody>
    </table>

    <div style="margin-top: 20px;">
        {{ $postings->links() }}
    </div>

</x-admin-layout>