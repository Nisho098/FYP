<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Profile</title>
    <link rel="stylesheet" href="{{ asset('css/recruiterProfile.css') }}">
</head>
<body>
    <div class="header">
        <div class="profile-container">
            <!-- Avatar -->
            <div class="avatar">
                <div class="avatar-icon">
                    <svg viewBox="0 0 24 24">
                        <path d="M12 12c2.21 0 4-1.79 4-4s-1.79-4-4-4-4 1.79-4 4 1.79 4 4 4zm0 2c-2.67 0-8 1.34-8 4v2h16v-2c0-2.66-5.33-4-8-4z"/>
                    </svg>
                </div>
            </div>
            <!-- Profile Info -->
            <div class="profile-info">
                <div class="profile-details">
                    <h2>{{ Auth::user()->name }}</h2>
                    <p><strong>Address:</strong> {{ Auth::user()->studentProfile->location ?? 'Not Provided' }}</p>
                    <p><strong>Email:</strong> {{ Auth::user()->email }}</p>
                    <p><strong>Contact:</strong> {{ Auth::user()->studentProfile->contact ?? 'Not Provided' }}</p>
                </div>
            </div>
            <!-- Edit Button -->
            <div class="edit-button">
            <a href="{{ route('studentProfile.edit') }}" class="btn">Edit Profile</a>
            </div>
            
        </div>
    </div>

    <div class="container">
        <div class="section">
            <h3>About me</h3>
            <p>{{ $profile->about ?? 'No information provided.' }}</p>
            <h3>Education</h3>
            <p>{{ $profile->university_name ?? 'No information provided.' }}</p>
           
        </div>

        <div class="section">
    <h3>Skills</h3>
    <div class="skills-grid" id="skills-container">
        @if (!empty($profile) && !empty($profile->skills))
            @foreach (explode(',', $profile->skills) as $skill)
                <span class="skill">{{ $skill }}</span>
            @endforeach
        @else
            <p>No skills listed.</p>
        @endif
    </div>
</div>



<div class="section">
    <h3>File Attachment</h3>
    @if ($profile->resume_url)
        <div class="file-attachment">
            <div class="file-info">
            <p>{{ basename($profile->resume_url) }}</p> 
            </div>
            <a href="{{ asset('storage/' . $profile->resume_url) }}" target="_blank" class="download-btn">
                <svg viewBox="0 0 24 24">
                    <path d="M19 9h-4V3H9v6H5l7 7 7-7zM5 18v2h14v-2H5z"/>
                </svg>
             
            </a>
        </div>
    @else
        <p>No resume uploaded.</p>
    @endif
</div>


        </div>
    </div>
    <script src="recruiterProfile.js"></script>
</body>
</html>
