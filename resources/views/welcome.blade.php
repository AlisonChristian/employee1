@include('layouts.welcome')
    <div class="flex-center position-ref full-height">
        <div class="content">
            <header>
            <header class="d-flex justify-content-between align-items-center p-3 bg-fixed" style="position: fixed; top: 0; left: 0; width: 100%; z-index: 1000; color:black;">
            @if (Route::has('login'))
        <div class="top-right links color-white">
            @auth
            <a href="{{ url('/admin') }}">Admin</a>
            @else
            <a class="btn btn-secondary btn-md" style="color: white; margin-top: 10%;" href="{{ route('login') }}">LOGIN</a>
            @if (Route::has('register'))
            <a class="btn btn-secondary btn-md" style="color: white; margin-top: 10%;" href="{{ route('register') }}">Register</a>
            @endif
            @endauth
        </div>
        @endif
            <div class="d-flex align-items-center">
        <!-- Logo -->
        <img src="../assets/images/Frame 1.png" alt="Logo" style="height: 50px; margin-right: 10px;">
        <!-- Text -->
        <h6 style="margin: 0; font-size: .75rem;">Voctech Academy</h6>
            </header>
            <div class="title m-b-md" style="color:black;">
                <h6 class="text-center"> WELCOME EMPLOYEE!</h6>
                <h1 class="text-center">“Building Skills For A  Bright Future”</h5>
                <h6 class="text-center">Cebu Technical Vocational Training and Assessment Academy Inc.</h6>
                <div class="clockStyle" id="clock" style="color:black;"></div>
            </div>
        </div>
    </div>
    <style>
        body {
            background-image: url('../assets/images/Rectangle 38.png');
            background-size: cover;
            background-position: center; 
        }
    </style>