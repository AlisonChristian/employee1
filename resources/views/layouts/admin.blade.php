<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Admin Panel')</title>
    <!-- Add your CSS links here -->
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
</head>
<body>
    <div class="container">

        <!-- Main content area -->
        <main>
            @yield('content')
        </main>
    </div>

    <!-- Add your JS scripts here -->
    <script src="{{ asset('js/app.js') }}"></script>
</body>
</html>
