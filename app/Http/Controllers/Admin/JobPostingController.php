<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\JobPosting;
use Illuminate\Http\Request;

class JobPostingController extends Controller
{
    public function index()
    {
        $postings = JobPosting::orderBy('created_at', 'desc')->paginate(15);

        return view('admin.postings.index', ['postings' => $postings]);
    }

    public function create()
    {
        return view('admin.postings.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'department' => 'nullable|string|max:255',
            'description' => 'required|string',
            'application_deadline' => 'nullable|date',
            'is_active' => 'required|boolean',
        ]);

        JobPosting::create($validated);

        return redirect()->route('admin.postings.index')->with('status', 'Job posting created successfully.');
    }

    public function edit(JobPosting $posting)
    {
        return view('admin.postings.edit', ['posting' => $posting]);
    }

    public function update(Request $request, JobPosting $posting)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'department' => 'nullable|string|max:255',
            'description' => 'required|string',
            'application_deadline' => 'nullable|date',
            'is_active' => 'required|boolean',
        ]);

        $posting->update($validated);

        return redirect()->route('admin.postings.index')->with('status', 'Job posting updated successfully.');
    }

    public function destroy(JobPosting $posting)
    {
        $posting->delete();

        return redirect()->route('admin.postings.index')->with('status', 'Job posting deleted successfully.');
    }
}