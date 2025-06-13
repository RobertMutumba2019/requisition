<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\RequestForm as RequestModel;  
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    //
    /**
     * Show the login form.
     */
    public function showLogin()
    {
        // If already logged in, redirect to dashboard
        if (session()->has('user_id')) {
            return redirect()->route('dashboard');
        }
        return view('auth.login');
    }
   
    public function login(Request $request)
{
    $credentials = $request->validate([
        'username' => 'required|string',
        'password' => 'required|string',
    ]);

    $user = \App\Models\RequestForm::where('username', $credentials['username'])->first();

    if (! $user) {
        return back()->withErrors(['username' => 'User not found.']);
    }

    // Only use Hash::check — no need to check for Bcrypt manually if ALL are Bcrypt
    if (! Hash::check($credentials['password'], $user->password)) {
        return back()->withErrors(['password' => 'Incorrect password.']);
    }

    session(['user_id' => $user->id]);
    $request->session()->regenerate();

    return redirect()->route('dashboard');
}
public function logout(Request $request)
{
    // Clear session data
    $request->session()->flush();

    // Optionally regenerate session ID
    $request->session()->invalidate();
    $request->session()->regenerateToken();

    // Redirect to login page with a status message
    return redirect()->route('login')->with('status', 'You have been logged out successfully.');
}

}