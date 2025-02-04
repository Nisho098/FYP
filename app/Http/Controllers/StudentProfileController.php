<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Job;
use App\Models\User;
use App\Models\Studentprofile;
use App\Models\Application;

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
    public function create()
{
    $user = Auth::user();
    $profile = $user->studentProfile;
    return view('frontend.StudentProfiles.Profile', compact('user', 'profile'));
}

    public function edit()
{
    $user = Auth::User();

    return view("frontend.StudentProfiles.editProfile", ['user' => $user,]);

}
public function update(Request $request)
{
    // Validate request data
    $validated = $request->validate([
        'name' => 'required|string|max:255',
        'about' => 'nullable|string|max:1000',
         'university_name' => 'nullable|string|max:255',
        'skills' => 'nullable|string|max:500',
        'contact' => 'nullable|string|max:20',
        'location' => 'nullable|string|max:255',
        'resume_url' => 'nullable|file|mimes:pdf,doc,docx|max:2048',
    ]);
  


    // Get the authenticated user
    $user = auth()->user();

    // Check if the user has an existing profile, or create a new one
    $profile = $user->studentProfile ?? new Studentprofile();
    $profile->user_id = $user->id;

    // Update profile fields
    $profile->name = $validated['name'];
    $profile->about = $validated['about'] ?? '';
    $profile->university_name = $validated['university_name'] ?? '';
    $profile->skills = $validated['skills'] ?? '';
    $profile->contact = $validated['contact'] ?? '';
    $profile->location = $validated['location'] ?? '';


    // Handle file upload
    if ($request->hasFile('resume_url')) {
        $resumePath = $request->file('resume_url')->store('resumes', 'public');
        $profile->resume_url = $resumePath;
    }

    // Save the profile
    $profile->save();

    // Redirect with a success message
    return redirect()->route('studentProfile.create')->with('success', 'Profile updated successfully!');
}

public function showStudentApplications()
{
    $user = auth()->user(); // Get the authenticated user
    $studentProfile = $user->studentProfile; // Fetch the student's profile

    // Fetch applications for the logged-in student
    $applications = Application::where('student_id', $studentProfile->id)->get();

    return view('frontend.StudentProfiles.application', compact('applications')); // Pass applications to the view
}
}