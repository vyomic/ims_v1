<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" href="{{ asset('images/logo.png') }}" type="image/x-icon">
    <title>@yield('title', 'Default Title')</title>
    @vite(['resources/js/app.js', 'resources/css/app.css'])
</head>
<body class="font-sans bg-gray-100">

    <!-- Navbar Component -->
    @include('components.navbar')

    <div>
        @yield('content')
    </div>
    <footer class="bg-dark-gray text-white py-8 mt-12">
        <div class="max-w-7xl mx-auto text-center">
            <p>&copy; 2024 Institute Management. All rights reserved.</p>
        </div>
    </footer>
</body>
</html>
