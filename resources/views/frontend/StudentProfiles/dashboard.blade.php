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
                <li><a href="#" class="nav-item"><i class="uil uil-briefcase"></i><span>Jobs</span></a></li>
                <li><a href="#" class="nav-item"><i class="uil uil-comment-alt-dots"></i><span>Chats</span></a></li>
                <li><a href="#" class="nav-item"><i class="uil uil-building"></i><span>Companies</span></a></li>
            </ul>
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
                        <p><strong>Contact:</strong> {{ Auth::user()->contact_number ?? 'Not Provided' }}</p>
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
                            <th>Details</th>
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
                            
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <!-- Scripts -->
    <script src="{{ asset('js/studentdashboard.js') }}"></script>
</body>
</html>
