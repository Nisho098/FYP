<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Job;

class StudentProfileController extends Controller
{
    public function dashboard()
    {
        
        if (Auth::check()) {
            // Get the authenticated user
            $user = Auth::user();

            // Check the role of the user and redirect accordingly
            if ($user->role == 'student') {
                // If the user is a student, show the student dashboard
                $jobs = Job::all(); 
                return view('frontend.StudentProfiles.dashboard', compact('user','jobs'));
            }

            // If the user is a recruiter, redirect them to the recruiter dashboard
            return redirect()->route('recruiterdashboard');
        }

        // If not authenticated, redirect to login
        return redirect()->route('login')->with('error', 'Please log in to access the dashboard.');
    }
}
