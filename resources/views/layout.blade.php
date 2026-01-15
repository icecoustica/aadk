<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Agensi Dadah Kebangsaan Smart Dashboard</title>
    <link rel="stylesheet" href="{{ asset('css/home.css') }}">
    <style>
       

    </style>


</head>
<body>
    {{-- 
    <nav class="nav">
        <ul class="nav-links">
            <li><a href="{{ route('home') }}" class="{{ request()->routeIs('home') ? 'active' : '' }}">Home</a></li>
            <li><a href="{{ route('about') }}" class="{{ request()->routeIs('about') ? 'active' : '' }}">About</a></li>
        </ul>
    </nav>
    --}}

    <div class="container">
        @yield('content')
    </div>
</body>
</html>
