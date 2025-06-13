<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\RequestForm as RequestModel;


class DashboardController extends Controller
{
    //
    public function index(Request $httpRequest)
    {
        // Retrieve the logged-in user:
        $userId = $httpRequest->session()->get('user_id');
        $user = RequestModel::find($userId);

        // If user not found (shouldn't happen if middleware is correct), force logout:
        if (! $user) {
            // Clear session and redirect:
            $httpRequest->session()->forget('user_id');
            return redirect()->route('login')->withErrors('User not found.');
        }

        // Pass user data to view as needed:
        return view('dashboard.index', [
            'user' => $user,
            // other data for dashboard...
        ]);
    }


}
