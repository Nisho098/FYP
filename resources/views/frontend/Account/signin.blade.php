<a href="{{ route('home') }}" class="back-btn">Back</a>

<div class="login-container">
    <div class="login-box">
  
        <h1>Welcome back!</h1>
        <p>Enter your credentials to access your account</p>
        <link rel="stylesheet" href="{{ asset('css/login.css') }}">
        <form action="{{ route('Account.signin') }}" method="POST">
        @if (session('success'))
        <div>
            <p>{{ session('success') }}</p>
        </div>
    @endif

            @csrf
            <div class="form-group">
                <label for="email">Email address</label>
                <input type="email" id="email" name="email" placeholder="Enter your email" >
            </div>
            <div class="form-group">
                <label for="password">Password</label>
                <input type="password" id="password" name="password" placeholder="Enter your password" >
            </div>
            <div class="form-group">
                <a href="#" class="forgot-password">Forgot password?</a>
            </div>
            
            <button type="submit" class="btn">Login</button>
           
           

            
        </form>
        <p class="sign-in-link">Don't have an account?
    <a href="{{ route('Account.studentsignup') }}">SignUp</a>
</p>
    </div>
</div>


