<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules;
use Illuminate\Validation\ValidationException;
use Illuminate\View\View;

class RegisteredUserController extends Controller
{
    public function create(): View
    {
        return view('auth.register');
    }
   public function store(Request $request): RedirectResponse {
    $request->validate([
        'name' => 'required|string|max:255',
        'email' => 'required|string|lowercase|email|max:255|unique:'.User::class,
        'phone' => 'required|string|max:20',
        'university' => 'required|string|max:255',
        'university_other' => 'required_if:university,Other|nullable|string|max:255',
        'course' => 'required|string|max:255',
        'course_other' => 'required_if:course,Other|nullable|string|max:255',
        'password' => ['required', 'confirmed', Rules\Password::defaults()],
    ]);

    $finalUniversity = $request->university === 'Other' ? $request->university_other : $request->university;
    $finalCourse = $request->course === 'Other' ? $request->course_other : $request->course;

    $user = User::create([
        'name' => $request->name,
        'email' => $request->email,
        'phone' => $request->phone,
        'university' => $finalUniversity,
        'course' => $finalCourse,
        'role' => 'intern',
        'password' => Hash::make($request->password),
    ]);

    event(new Registered($user));

    Auth::login($user);

    return redirect($user->dashboardRoute());
}
}