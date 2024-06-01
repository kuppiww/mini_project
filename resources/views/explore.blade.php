<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Explore</title>
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <style>
        body {
            background-color: #000;
            color: #fff;
            display: flex;
            height: 100vh;
            font-family: 'Arial', sans-serif;
        }

        .navbar {
            background-color: #111;
            position: fixed;
            width: 220px;
            top: 0;
            bottom: 0;
            overflow-y: auto;
            padding: 20px;
        }

        .navbar a,
        .navbar button {
            color: #fff;
            margin-bottom: 10px;
            text-decoration: none;
            display: block;
            padding: 10px 15px;
            border: none;
            background: none;
            cursor: pointer;
        }

        .navbar a:hover,
        .navbar button:hover {
            text-decoration: underline;
        }

        .navbar img.profile-pic {
            width: 50px;
            height: 50px;
            border-radius: 50%;
            margin-bottom: 15px;
            border: 2px solid #fff;
        }

        .navbar .profile-section {
            margin-bottom: 20px;
            padding-bottom: 20px;
            border-bottom: 1px solid #333;
        }

        .navbar .icon {
            margin-right: 10px;
        }

        .content {
            margin-left: 240px;
            padding: 20px;
            width: calc(100% - 240px);
            display: inline-block;
        }

        .main-content {
            flex: 2;
            margin-right: 20px;
            display: flex;
            flex-direction: column;
            align-items: center;
        }

        .logo-container {
            display: flex;
            justify-content: center;
            margin-bottom: 20px;
        }

        .button-container {
            display: flex;
            justify-content: center;
            margin-bottom: 20px;
        }

        .btn-custom {
            background-color: #fff;
            color: #000;
            border: none;
            padding: 10px 20px;
            margin: 5px;
            border-radius: 5px;
        }

        .btn-custom:hover {
            background-color: #ddd;
        }

        .search-box {
            margin-bottom: 20px;
            width: 100%;
        }

        .recommendations {
            background-color: #111;
            padding: 20px;
            border-radius: 8px;
            width: 220px;
            position: fixed;
            margin-top: 90px;
            right: 20px;
        }

        .recommendation-item {
            display: flex;
            justify-content: space-between;
            margin-bottom: 10px;
        }

        .recommendation-item a {
            color: #fff;
        }

        input[type="text"] {
            width: 100%;
            padding: 10px;
            margin-bottom: 10px;
            border: none;
            border-radius: 5px;
        }
    </style>
</head>

<body>
    <div class="navbar">
        @guest
        <a href="{{ route('login') }}"><img src="{{ asset('icons/login.png') }}" alt="Login Icon" class="icon">Login</a>
        @else
        <div class="profile-section">
            <img src="{{ asset('images/profile.png') }}" alt="Profile Picture" class="profile-pic">
            <span>{{ Auth::user()->name }}</span>
        </div>

        <a href="{{ route('home') }}"><img src="{{ asset('icons/home.png') }}" alt="Home Icon" class="icon">Beranda</a>
        <a href="{{ route('explore') }}"><img src="{{ asset('icons/explore.png') }}" alt="Explore Icon" class="icon">Explore</a>
        <a href="{{ route('notifications') }}"><img src="{{ asset('icons/notification.png') }}" alt="Notification Icon" class="icon">Notification</a>
        <a href="{{ route('post.store') }}"><img src="{{ asset('icons/post.png') }}" alt="Post Icon" class="icon">Posting</a>
        <a href="{{ route('bookmarks') }}"><img src="{{ asset('icons/bookmarks.png') }}" alt="Bookmarks Icon" class="icon">Bookmarks</a>
        <button onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
            <img src="{{ asset('icons/logout.png') }}" alt="Logout Icon" class="icon">Logout
        </button>
        <form id="logout-form" action="{{ route('home') }}" method="POST" style="display: none;">
            @csrf
        </form>
        @endguest
    </div>

    <div class="content">
        <div class="main-content">
            <div class="logo-container">
                <img src="{{ asset('images/logo-medsos.png') }}" alt="Logo" width="50">
            </div>

            <div class="button-container">
                <button class="btn btn-custom">For You</button>
                <button class="btn btn-custom">Following</button>
            </div>

            <div class="search-box">
                <input type="text" placeholder="Search accounts">
            </div>
        </div>

        <div class="recommendations">
            <h2>Siapa yang harus diikuti</h2>
            <small>Orang yang mungkin Anda kenal</small>
            @foreach ($recommendations as $user)
            <div class="recommendation-item">
                <span>{{ $user->name }}</span>
                <a href="{{ route('follow', $user->id) }}" class="btn btn-custom">Follow</a>
            </div>
            @endforeach
        </div>
    </div>
</body>

</html>