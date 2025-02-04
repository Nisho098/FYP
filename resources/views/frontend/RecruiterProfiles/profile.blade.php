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
                    <p><strong>Address:</strong> {{ Auth::user()->location ?? 'Not Provided' }}</p>
                    <p><strong>Email:</strong> {{ Auth::user()->email }}</p>
                    <p><strong>Contact:</strong> {{ Auth::user()->contact_number ?? 'Not Provided' }}</p>
                </div>
            </div>
            <!-- Edit Button -->
            <div class="edit-button">
            <a href="{{ route('recruiterProfile.edit') }}" class="btn">Edit Profile</a>
            </div>
            
        </div>
    </div>

    <div class="container">
        <div class="section">
            <h3>About Company</h3>
           
          
           
        </div>

        <div class="section">
    <h3>Contact personal details</h3>
    
</div>


<div class="section">
    <h3>Company Details</h3>
    
</div>

        </div>
    </div>
    <script src="recruiterProfile.js"></script>
</body>
</html>
