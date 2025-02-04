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



    <title>Recruiter Dashboard</title>
</head>
<body>
    <div class="container">
        <!-- Sidebar -->
        <nav class="sidebar">
            <div class="logo">
                <span class="logo-name">Career Bridge</span>
            </div>

            <ul class="nav-links">
                <li><a href="{{ route('dashboard') }}" class="nav-item"><span>Dashboard</span></a></li>
                <li>
                <a href="{{ route('recruiter.showApplications', ['jobId' => $job->id ?? null]) }}" class="nav-item">
    <span>Candidates</span>
</a>







                <li><a href="#" class="nav-item"><span>Chats</span></a></li>
                <li><a href="{{ route('postinternships.tablecreate') }}" class="nav-item"><span>All Internships</span></a></li>
                <li><a href="{{ route('postinternships.create') }}" class="nav-item"><span>Post Internships</span></a></li>
            </ul>

            <!-- Logout Button -->
            <div class="logout">
                <a href="{{ route('home') }}"><i class="uil uil-signout"></i>Logout</a>
            </div>
        </nav>

        
      


        <!-- Main Content -->
       
        <div class="header">
    <div class="dropdown">
        <button class="dropdown-btn">
        <i class="uil uil-user-circle"></i> 
            <span>{{ Auth::user()->name }}</span> 
            <i class="uil uil-angle-down"></i>
        </button>
        <div class="dropdown-menu">
            <a href="{{ route('recruiterProfile.create') }}">My Profile</a>
            <a href="#">Settings</a>
        </div>
    </div>
</div>
<div class="main-content">
@if (session('success'))
    <div class="alert alert-success">
        <p>{{ session('success') }}</p>
    </div>
@endif
    </div>

    
   

    

    <script src="{{ asset('js/studentdashboard.js') }}"></script>
    <script src="{{ asset('js/custom-buttons.js') }}"></script>
</body>
</html>
