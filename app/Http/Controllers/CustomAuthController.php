<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use App\Models\User;

class CustomAuthController extends Controller
{
    public function showAuthForm()
    {
        return view('auth.login');
    }

    public function processLogin(Request $request)
    {
        $credentials = $request->validate([
            'username' => 'required|string',
            'password' => 'required|string',
        ]);

        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();
            return $this->redirectUser();
        }

        return back()->withErrors(['username' => 'The provided credentials do not match our records.']);
    }

    public function showRegistrationForm()
    {
        return view('auth.register');
    }

    public function processRegistration(Request $request)
    {
        $validatedData = $request->validate([
            'username' => 'required|string|max:255|unique:users',
            'password' => 'required|string|min:2',
            'role' => 'required|in:journalist,editor,reader',
        ]);

        User::create([
            'username' => $validatedData['username'],
            'password' => Hash::make($validatedData['password']),
            'role' => $validatedData['role'],
        ]);

        return redirect('/login')->withSuccess('Registration successful. Please login.');
    }

    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect('/login');
    }

    private function redirectUser()
    {
        $user = Auth::user();
        return match ($user->role) {
            'journalist' => redirect()->intended('journalist/dashboard'),
            'editor' => redirect()->intended('editor/dashboard'),
            default => redirect()->intended('/'),
        };
    }
}
