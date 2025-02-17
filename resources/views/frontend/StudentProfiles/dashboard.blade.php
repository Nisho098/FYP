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
  
        <!-- Sidebar -->
        <nav class="sidebar">
            <div class="logo">
                <span class="logo-name">Career Bridge</span>
            </div>

            <ul class="nav-links">
                <li><a href="{{ route('home.dindex') }}" class="nav-item"><i class="uil uil-tachometer-fast-alt"></i><span>Dashboard</span></a></li>
                <li><a href="{{ route('StudentProfile.showStudentApplications') }}" class="nav-item"><i class="uil uil-briefcase"></i><span>Application</span></a></li>
                <li><a href="{{ route('chat.index') }}" class="nav-item"><i class="uil uil-comment-alt-dots"></i><span>Chats</span></a></li>
                <li><a href="#" class="nav-item"><i class="uil uil-building"></i><span>Companies</span></a></li>
                <!-- <li><a href="{{ route('studentProfile.create') }}" class="nav-item"><i class="uil uil-user-circle"></i><span>My Profile</span></a></li> -->
            </ul>

            <!-- Logout Button -->
            <div class="logout">
                <a href="{{ route('home') }}"><i class="uil uil-signout"></i>Logout</a>
            </div>
        </nav>

        <!-- Main Content -->
       <!-- Main Content -->
<div class="main-content">
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

    <div class="content">
        @yield('content') <!-- This ensures content from profile page appears here -->
    </div>
</div>


    <!-- Scripts -->
    <script src="{{ asset('js/studentdashboard.js') }}"></script>
</body>
</html>
