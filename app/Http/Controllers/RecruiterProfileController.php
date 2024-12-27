<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class RecruiterProfileController extends Controller
{
    public function dashboard()
    {
       
        if (Auth::check()) {
            
            $user = Auth::user();

         
            if ($user->role == 'recruiter') {
                return view('frontend.RecruiterProfiles.dashboard', compact('user'));
            }

        
            return redirect()->route('dashboard');
        }

        // If not authenticated, redirect to login
        return redirect()->route('login')->with('error', 'Please log in to access the dashboard.');
    }
}
