<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- CSS -->
    <link rel="stylesheet" href="{{ asset('css/dashboard.css') }}">

    <!-- Iconscout CSS -->
    <link rel="stylesheet" href="https://unicons.iconscout.com/release/v4.0.0/css/line.css">

    <title>Student Dashboard</title>
</head>
<body>
    <div class="container">
        <!-- Sidebar -->
        <nav class="sidebar">
            <div class="logo">
                <span class="logo-name">Career Bridge</span>
            </div>

            <ul class="nav-links">
                <li><a href="{{ route('dashboard') }}" class="nav-item"><i class="uil uil-tachometer-fast-alt"></i><span>Dashboard</span></a></li>
                <li><a href="{{ route('StudentProfile.showStudentApplications') }}" class="nav-item"><i class="uil uil-briefcase"></i><span>Application</span></a></li>

                <li><a href="#" class="nav-item"><i class="uil uil-comment-alt-dots"></i><span>Chats</span></a></li>
                <li><a href="#" class="nav-item"><i class="uil uil-building"></i><span>Companies</span></a></li>
            </ul>
            <!-- Logout Button -->
     <div class="logout">
                <a href="{{ route('home') }}"><i class="uil uil-signout"></i>Logout</a>
            </div>
        </nav>
        

        <!-- Main Content -->
        <div class="main-content">
            <!-- Profile Section -->
            <div class="profile-section">
                <div class="profile-info">
                    <div class="profile-details">
                        <h2>{{ Auth::user()->name }}</h2>
                        <p><strong>Address:</strong> {{ Auth::user()->location ?? 'Not Provided' }}</p>
                        <p><strong>Email:</strong> {{ Auth::user()->email }}</p>
                        <p><strong>Contact:</strong> {{ Auth::user()->number ?? 'Not Provided' }}</p>
                    </div>
                </div>
            </div>

            <!-- Job Listings Section -->
            <div class="box-container">
                <table class="job-listing-table">
                    <thead>
                        <tr>
                            <th>Job Title</th>
                            <th>Job Type</th>
                            <th>Location</th>
                            <th>Deadline</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                    @php
                    $i = 0;
                @endphp
                        @foreach ($jobs as $job)
                        <tr>
                            <td>{{ $job->title }}</td>
                            <td>{{ ucfirst($job->job_type) }}</td>
                            <td>{{ $job->location }}</td>
                            <td>{{ \Carbon\Carbon::parse($job->application_deadline)->format('F j, Y') }}</td>
                            <td>
                            <div class="action-container">
    <button class="dropdown-btn">⋮</button>
    <div class="dropdown-menu">
        <div class="dropdown-item">
            <span class="icon">👁️</span>
            <a href="{{ route('job.create', $job->id) }}" class="btn btn-primary btn-sm">
                                <span>View Details</span>
                            </a>

        </div>
    </div>
</div>
                            </td>

                            
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>

     

    <div class="header">
    <div class="dropdown">
        <button class="dropdown-btn">
        <i class="uil uil-user-circle"></i> 
            <span>{{ Auth::user()->name }}</span> 
            <i class="uil uil-angle-down"></i>
        </button>
        <div class="dropdown-menu">
        <a href="{{ route('studentProfile.create') }}">My Profile</a>
            <a href="#">Settings</a>
        </div>
    </div>
</div>
<div class="main-content">
    </div>

    <!-- Scripts -->
    <script src="{{ asset('js/studentdashboard.js') }}"></script>
   
</body>
</html>
