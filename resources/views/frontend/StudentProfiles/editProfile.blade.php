<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Profile</title>
    <link rel="stylesheet" href="{{ asset('css/editRecruiterProfile.css') }}">
</head>
<body>
    <div class="container">
        <h1>Edit Profile</h1>
        
        <form action="{{ route('studentProfile.update') }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('POST')

            <!-- Name -->
            <div class="form-group">
                <label for="name">Name:</label>
                <input type="text" id="name" name="name" value="{{ old('name', Auth::user()->name) }}" required>
            </div>

            <!-- About Me -->
            <div class="form-group">
                <label for="about">About Me:</label>
                <textarea id="about" name="about" rows="5" placeholder="Tell us about yourself">{{ old('about', optional(Auth::user()->studentProfile)->about) }}</textarea>
            </div>

            <!-- Education -->
            <div class="form-group">
                <label for="university_name">Education:</label>
                <input type="text" id="university_name" name="university_name" value="{{ old('university_name', optional(Auth::user()->studentProfile)->university_name) }}" placeholder="Enter your university name">
            </div>

            <!-- Skills -->
            <div class="form-group">
                <label for="skills">Skills:</label>
                <input type="text" id="skills" name="skills" placeholder="E.g., HTML, CSS, JavaScript" value="{{ old('skills', optional(Auth::user()->studentProfile)->skills) }}">
            </div>

            <!-- Contact Number -->
            <div class="form-group">
                <label for="contact">Contact Number:</label>
                <input type="text" id="contact" name="contact" value="{{ old('contact', optional(Auth::user()->studentProfile)->contact) }}">
            </div>

            <!-- Address -->
            <div class="form-group">
                <label for="location">Address:</label>
                <input type="text" id="location" name="location" value="{{ old('location', optional(Auth::user()->studentProfile)->location) }}">
            </div>

            <!-- CV Upload -->
            <div class="form-group">
                <label for="cv">Upload CV:</label>
                <input type="file" id="cv" name="resume_url" accept=".pdf,.doc,.docx">
                @if(optional(Auth::user()->studentProfile)->resume_url)
                    <a href="{{ asset('storage/' . Auth::user()->studentProfile->resume_url) }}" target="_blank">View Current Resume</a>
                @endif
            </div>

            <!-- Submit Button -->
            <div class="form-group">
                <button type="submit" class="btn">Save Changes</button>
            </div>
        </form>
    </div>
</body>
</html>
