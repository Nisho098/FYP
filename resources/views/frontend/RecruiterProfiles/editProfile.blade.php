<!-- <!DOCTYPE html>
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

        
            <div class="form-group">
                <label for="name">Name:</label>
                <input type="text" id="name" name="name" value="{{ old('name', Auth::user()->name) }}" required>
                @error('name')
                    <div class="error">{{ $message }}</div>
                @enderror
            </div>

         
            <div class="form-group">
                <label for="about">About Me:</label>
                <textarea id="about" name="about" rows="5">{{ old('about', Auth::user()->studentProfile->about ?? '') }}</textarea>
                @error('about')
                    <div class="error">{{ $message }}</div>
                @enderror
            </div>

        
            <div class="form-group">
                <label for="education">Education:</label>
                <textarea id="education" name="education" rows="4">{{ old('education', Auth::user()->studentProfile->education ?? '') }}</textarea>
                @error('education')
                    <div class="error">{{ $message }}</div>
                @enderror
            </div>

       
            <div class="form-group">
                <label for="skills">Skills:</label>
                <input type="text" id="skills" name="skills" value="{{ old('skills', Auth::user()->studentProfile->skills ? implode(', ', explode(',', Auth::user()->studentProfile->skills)) : '') }}">
                @error('skills')
                    <div class="error">{{ $message }}</div>
                @enderror
            </div>

       
            <div class="form-group">
                <label for="cv">Upload CV:</label>
                <input type="file" id="cv" name="resume_url" accept=".pdf,.doc,.docx">
                @if(Auth::user()->studentProfile->resume_url)
                    <a href="{{ asset('storage/' . Auth::user()->studentProfile->resume_url) }}" target="_blank">View Current Resume</a>
                @endif
            </div>

         
            <div class="form-group">
                <button type="submit" class="btn">Save Changes</button>
            </div>
        </form>
    </div>
</body>
</html> -->
