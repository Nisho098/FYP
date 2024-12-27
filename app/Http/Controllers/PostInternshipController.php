<?php

namespace App\Http\Controllers;
use Illuminate\support\facades\Auth;

use Illuminate\Http\Request;
use App\Models\Job;


class PostInternshipController extends Controller
{
    public function index()
    {
        $internships = Job::all();
        return view('frontend.RecruiterProfiles.internshiptable', compact('internships'));
    }

    public function tablecreate()
{
   
    $jobs = Job::all();
    return view('frontend.RecruiterProfiles.internshiptable', compact('jobs'));
}



/**
 * Show the form for creating a new resource.
 *
 * @return \Illuminate\Http\Response
 */
public function create()
{
    return view('frontend.RecruiterProfiles.postinternship');
}







/**
 * Store a newly created resource in storage.
 *
 * @param  \Illuminate\Http\Request  $request
 * @return \Illuminate\Http\Response
 */
public function store(Request $request)
{
    // Validate the incoming data
    $validatedData = $request->validate([
        'title' => 'required|string|max:255',
        'description' => 'required|string',
        'location' => 'required|nullable|string|max:255',
        'job_type' => 'required|string|in:full-time,part-time,internship',
        'industry' => 'required|nullable|string|max:255',
        'requirements' => 'required|nullable|string',
        'application_deadline' => 'required|nullable|date|after_or_equal:today',
    ]);

    // Create a new Job entry
    $jobs = new Job;

    $jobs->title = $request->title;
    $jobs->description = $request->description;
    $jobs->location = $request->location;
    $jobs->job_type = $request->job_type;
    $jobs->industry = $request->industry;
    $jobs->requirements = $request->requirements;
    $jobs->application_deadline = $request->application_deadline;
    $jobs->recruiter_id = auth()->user()->id; // Assign the recruiter (authenticated user) ID
    
    // Save the Job
    $jobs->save();

    // Return a success message directly without redirect
    return redirect()->route('postinternships.tablecreate')->with('success', 'Internship posted successfully!');



}







/**
 * Display the specified resource.
 *
 * @param  int  $id
 * @return \Illuminate\Http\Response
 */
public function show($id)
{
   
}

/**
 * Show the form for editing the specified resource.
 *
 * @param  int  $id
 * @return \Illuminate\Http\Response
 */
public function edit($id)
{
    $job = Job::findOrFail($id);

    return view("frontend.RecruiterProfiles.internshipedit", ['job' => $job,]);

}

/**
 * Update the specified resource in storage.
 *
 * @param  \Illuminate\Http\Request  $request
 * @param  int  $id
 * @return \Illuminate\Http\Response
 */
public function update(Request $request, $id)
{
    $job = Job::findOrFail($id);

    // Validate the request
    $request->validate([
        "title" => "required|string|max:255",
        "description" => "required|string",
        "location" => "required|string|max:255",
        "job_type" => "required|string",
        "industry" => "required|string|max:255",
        "application_deadline" => "required|date",
    ]);

    // Update the job
    $job->update([
       'title' => $request->title,
       'description' => $request->description,
       'location' => $request->location,
       'job_type' => $request->job_type,
       'industry' => $request->industry,
       'application_deadline' => $request->application_deadline,
    ]);

    // Redirect with a success message
    return redirect()->route('postinternships.tablecreate')->with('success', 'Job updated successfully.');
}


/**
 * Remove the specified resource from storage.
 *
 * @param  int  $id
 * @return \Illuminate\Http\Response
 */
public function destroy($id)
{
    $job = Job::findOrFail($id);
    $job->delete();
    return redirect()->back()->with('success', 'Job deleted successfully.');

}
}


