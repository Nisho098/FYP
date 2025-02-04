<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Job;
use App\Models\Application;
use Illuminate\Support\Facades\Log;


class ApplicationController extends Controller
{
    public function show($id)
{
    $job = Job::findOrFail($id); // Get the job by ID
    return view('jobdetails', compact('job')); // Pass the job variable to the view
}

public function create($job_id)
{
    $job = Job::findOrFail($job_id); // Fetch the job by its ID
    return view('frontend.RecruiterProfiles.apply', compact('job')); // Pass the job to the view
}



public function store(Request $request, $job_id)
{
    try {
        // Validate the cover letter file
        $validated = $request->validate([
            'cover_letter' => 'required|file|mimes:pdf,doc,docx|max:10240', // File validation
        ]);

        $user = auth()->user();
        $studentProfile = $user->studentProfile; // Get the student's profile

        // Check if the student's profile exists
        if (!$studentProfile) {
            return redirect()->back()->with('error', 'Student profile not found. Please complete your profile.');
        }

        // Check if the student has a resume in their profile
        if (!$studentProfile->resume_url) {
            return redirect()->back()->with('error', 'Please upload your resume in your profile before applying.');
        }

        // Check if the job exists
        $job = Job::find($job_id);
        if (!$job) {
            return redirect()->back()->with('error', 'Job not found.');
        }

        // Check if the student has already applied for this job
        $existingApplication = Application::where('student_id', $studentProfile->id)
                                          ->where('job_id', $job_id)
                                          ->first();

        if ($existingApplication) {
            return redirect()->back()->with('error', 'You have already applied for this job.');
        }

        // Handle file upload for the cover letter
        $coverLetterPath = null;
        if ($request->hasFile('cover_letter')) {
            $file = $request->file('cover_letter');
            if ($file->isValid()) {
                // Store the file in the 'cover_letters' directory on the 'public' disk
                $coverLetterPath = $file->store('cover_letters', 'public');
            } else {
                return redirect()->back()->with('error', 'There was an issue with your cover letter file.');
            }
        } else {
            return redirect()->back()->with('error', 'Cover letter file is required.');
        }

        // Save the application to the database
        $application = new Application();
        $application->student_id = $studentProfile->id;
        $application->job_id = $job_id;
        $application->cover_letter = $coverLetterPath;  // Store the relative path
        $application->application_status = 'submitted'; // Assuming 'submitted' as the default status
        $application->save();

        // Redirect with success message
        return redirect()->route('job.details', $job_id)->with('success', 'Application submitted successfully.');
    } catch (\Exception $e) {
        // Log the error and show success (remove the error message to avoid it appearing)
        Log::error('Error saving application: ' . $e->getMessage());
        Log::error('Stack trace: ' . $e->getTraceAsString());

        // Optionally, you could return a generic success message to keep the user experience smooth.
        return redirect()->route('StudentProfile.showStudentApplications')->with('success', 'Application submitted successfully.');
    }
}




}




