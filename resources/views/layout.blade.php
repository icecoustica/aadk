<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Agensi Dadah Kebangsaan Smart Dashboard</title>
    <style>
        body {
            margin: 0;
            font-family: Arial, sans-serif;
            background-color: #1e293b;
            color: #f1f5f9;
            min-height: 100vh;
            text-align: center;
            padding-top: 80px; /* space for fixed navbar */
        }

        /* Navigation Bar */
        .nav {
            background-color: #0f172a;
            padding: 1rem 0;
            position: fixed;
            width: 100%;
            top: 0;
            z-index: 1000;
        }

        .nav-links {
            list-style: none;
            padding: 0;
            margin: 0;
            display: flex;
            justify-content: center;
        }

        .nav-links li {
            margin: 0 15px;
        }

        .nav-links a {
            color: #94a3b8;
            text-decoration: none;
            font-weight: bold;
            transition: color 0.3s ease;
            padding: 5px 10px;
        }

        .nav-links a:hover, .nav-links a.active {
            color: #38bdf8;
        }

        /* Content */
        .content {
            display: flex;
            flex-direction: column;
            align-items: center;
            padding-bottom: 20px;
        }

        h1 {
            font-size: 3rem;
            margin-bottom: 0.5rem;
            color: #38bdf8;
        }

        h2 {
            font-size: 1.8rem;
            margin-bottom: 1rem;
            color: #cbd5e1;
        }

        p {
            font-size: 1rem;
            color: #94a3b8;
            margin-bottom: 2rem;
        }

        .login-button {
            display: inline-block;
            padding: 0.75rem 2rem;
            background-color: #0ea5e9;
            color: white;
            font-weight: bold;
            text-decoration: none;
            border-radius: 8px;
            transition: background-color 0.3s ease;
        }

        .login-button:hover {
            background-color: #0369a1;
        }

.video-container {
    display: flex;
    flex-wrap: wrap;
    justify-content: center;
    gap: 20px;
    margin-bottom: 2rem;
    width: 95%;
   
}

.video-container iframe {
    flex: 1 1 47%;
    max-width: 90%;
    height: 350px;
    border-radius: 10px;
    border: 1px solid #334155;
}

@media (max-width: 900px) {
    .video-container iframe {
        flex: 1 1 100%;
        max-width: 100%;
        height: 250px;
    }
}

    </style>


</head>
<body>
    <nav class="nav">
        <ul class="nav-links">
            <li><a href="{{ route('home') }}" class="{{ request()->routeIs('home') ? 'active' : '' }}">Home</a></li>
            <li><a href="{{ route('about') }}" class="{{ request()->routeIs('about') ? 'active' : '' }}">About</a></li>
        </ul>
    </nav>

    <div class="container">
        @yield('content')
    </div>
</body>
</html>
