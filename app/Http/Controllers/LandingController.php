<?php

namespace App\Http\Controllers;

use App\Models\JobPosting;
use Illuminate\Http\Request;

class LandingController extends Controller
{
    public function index()
    {
        $postings = JobPosting::where('is_active', true)
            ->orderBy('created_at', 'desc')
            ->get();

        return view('landing', ['postings' => $postings]);
    }
}