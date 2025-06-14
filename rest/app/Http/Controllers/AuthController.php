<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Models\RequestForm;
use App\Models\Approver;
use Illuminate\Validation\Rules\Password;

class AuthController extends Controller
{
    /**
     * Show the login form.
     */
    public function showLogin()
    {
        // If already logged in, redirect to appropriate dashboard
        if (session()->has('user_id') && session('role') === 'user') {
            return redirect()->route('dashboard');
        } elseif (session()->has('approver_id') && session('role') === 'approver') {
            return redirect()->route('approve');
        }

        return view('auth.login');
    }

    /**
     * Handle login for both users and approvers.
     */
    public function login(Request $request)
    {
        $credentials = $request->validate([
            'username' => 'required|string',
            'password' => 'required|string',
        ]);

        // First check normal user
        $user = RequestForm::where('username', $credentials['username'])->first();

        if ($user && Hash::check($credentials['password'], $user->password)) {
            session(['user_id' => $user->id, 'role' => 'user']);
            $request->session()->regenerate();
            return redirect()->route('dashboard');
        }

        // Then check approver
        $approver = Approver::where('username', $credentials['username'])->first();

        if ($approver && Hash::check($credentials['password'], $approver->password)) {
            session(['approver_id' => $approver->id, 'role' => 'approver']);
            $request->session()->regenerate();
            return redirect()->route('approve');
        }

        // If neither found
        return back()->withErrors(['username' => 'Invalid username or password.']);
    }

    /**
     * Logout method shared by both user types.
     */
    public function logout(Request $request)
    {
        $request->session()->flush(); // remove all session data
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect()->route('login')->with('status', 'You have been logged out successfully.');
    }

    public function showChangePasswordForm(Request $req)
{
    $req->validate([
    'current_password' => 'required',
    'new_password' => 'required|string|min:6|confirmed',
]);
    

        return view('auth.change');
}

public function changePassword(Request $request)
{
    $request->validate([
        'current_password' => 'required',
        'new_password' => 'required|string|min:6|confirmed',
    ]);

    $role = session('role');

    if ($role === 'user') {
        $user = \App\Models\RequestForm::find(session('user_id'));
    } elseif ($role === 'approver') {
        $user = \App\Models\Approver::find(session('approver_id'));
    } else {
        return back()->withErrors(['error' => 'Unauthorized']);
    }

    if (!Hash::check($request->current_password, $user->password)) {
        return back()->withErrors(['current_password' => 'Current password is incorrect']);
    }

    $user->password = Hash::make($request->new_password);
    $user->save();

    return back()->with('status', 'Password updated successfully.');
}


   
}