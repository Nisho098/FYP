<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use App\Models\Job;
use App\Models\Application;

class RecruiterProfileController extends Controller
{
    public function index()
{
    // Fetch jobs only associated with the logged-in recruiter
    $jobs = Job::where('recruiter_id', auth()->user()->recruiterProfile->id)->get();
    return view('frontend.RecruiterProfiles.internshiptable', compact('jobs'));
}

public function dashboard()
{
    if (Auth::check()) {
        $user = Auth::user();

        // Ensure recruiterProfile exists before accessing its ID
        if ($user->recruiterProfile) {
            $jobs = Job::where('recruiter_id', $user->recruiterProfile->id)->get();
        } else {
            $jobs = collect(); // Empty collection if no recruiter profile
        }

        if ($user->role == 'recruiter') {
            return view('frontend.RecruiterProfiles.dashboard', compact('user', 'jobs'));
        }

        return redirect()->route('dashboard');
    }

    return redirect()->route('login')->with('error', 'Please log in to access the dashboard.');
}



    public function create()
    {
        return view('frontend.RecruiterProfiles.Profile');
    }

    public function edit()
{
    $user = Auth::User();

    return view("frontend.RecruiterProfiles.editProfile", ['user' => $user,]);

}

// Show applications for a specific job
public function showApplications($jobId = null)
{
    if ($jobId) {
        // Fetch the job and its applications, with the associated job details
        $job = Job::findOrFail($jobId);
        $applications = Application::with('job')->where('job_id', $jobId)->get();
    } else {
        // Fetch all applications if no specific job is selected
        $applications = Application::with('job')->get();
        $job = null; // Define $job to prevent "Undefined variable" error
    }

    return view('frontend.RecruiterProfiles.jobApplication', compact('job', 'applications'));
}


public function rejectApplication($applicationId)
{
    $application = Application::findOrFail($applicationId);
    $application->update(['application_status' => 'rejected']);

    return redirect()->back()->with('success', 'Application rejected successfully.');
}
public function scheduleInterview($applicationId)
{
    $application = Application::findOrFail($applicationId);
    $application->update(['application_status' => 'under review']);

    // Optionally, set interview date or other details
    // $application->update(['interview_date' => now()]);

    return redirect()->back()->with('success', 'Interview scheduled successfully.');
}









}
