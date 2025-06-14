<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Approver;

class ApproveDashboard extends Controller
{
    //
      public function approves(Request $httpRequest)
    {
        // Retrieve the logged-in user:
        $approverId = $httpRequest->session()->get('approver_id');
        $approver = Approver::find($approverId);

        // If user not found (shouldn't happen if middleware is correct), force logout:
        if (! $approver) {
            // Clear session and redirect:
            $httpRequest->session()->forget('approver_id');
            return redirect()->route('login')->withErrors('User not found.');
        }

        // Pass user data to view as needed:
        return view('dashboard.approves', [
            'approve' => $approver,
            // other data for dashboard...
        ]);
    }


}

