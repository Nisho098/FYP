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

    <title>recruiter Dashboard</title>
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
                <li><a href="#" class="nav-item"><span>Application</span></a></li>
                <li><a href="#" class="nav-item"><span>Chats</span></a></li>
                <li>
                <a href="{{ route('postinternships.tablecreate') }}" class="nav-item">

        <span>All Internships</span>
        </a>
        </li>
                <li>
                <a href="{{ route('postinternships.create') }}" class="nav-item">
            <span>Post Internships</span>
</a>
</li>
            </ul>
        </nav>
       


       

        <!-- Main Content -->
        <div class="main-content">
        @yield('content')
</div>

    <!-- <ul class="logout-mode">
                <li><a href="#">
                    <i class="uil uil-signout"></i>
                    <span class="link-name">Logout</span>
                </a></li>
        </ul>
</div> -->



    <!-- Scripts -->
    <script src="{{ asset('js/studentdashboard.js') }}"></script>
</body>
</html>
