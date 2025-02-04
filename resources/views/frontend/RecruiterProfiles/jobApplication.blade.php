@csrf
<link rel="stylesheet" href="{{ asset('css/application.css') }}">
<div class="container">
    <h1>Candidate Applications for: 
        @if(isset($job))
            {{ $job->title }}
        @else
            All Jobs
        @endif
    </h1>

    <!-- Check for success message -->
    @if(session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    @if($applications->isEmpty())
        <div class="alert alert-warning">
            No applications have been submitted yet.
        </div>
    @else
        @foreach($applications as $application)
        <div class="application-card">
    <h2>{{ $application->student->name }}</h2>
    <p><strong>Email:</strong> {{ Auth::user()->email }}</p>
    <p><strong>Phone:</strong> {{ $application->user->studentProfile->contact ?? 'N/A' }}</p>
<p><strong>Location:</strong> {{ $application->user->studentProfile->location ?? 'N/A' }}</p>
<p><strong>Skills:</strong> 
    @if(!empty($application->user->studentProfile->skills))
        {{ implode(', ', json_decode($application->user->studentProfile->skills, true)) }}
    @else
        N/A
    @endif
</p>




                <div>
                    <strong>Applied for Job:</strong> {{ $application->job->title }}
                </div>

                <div>
                    <strong>Resume:</strong>
                    <a href="{{ asset('storage/' . $application->resume_url) }}" target="_blank">Download Resume</a>
                </div>

                <div class="application-actions">
                    <form action="{{ route('recruiter.rejectApplication', $application->id) }}" method="POST">
                        @csrf
                        <button type="submit" class="btn btn-danger">Reject</button>
                    </form>

                    <form action="{{ route('recruiter.scheduleInterview', $application->id) }}" method="POST">
                        @csrf
                        <button type="submit" class="btn btn-primary">Schedule Interview</button>
                    </form>
                </div>
            </div>
        @endforeach
    @endif
</div>
