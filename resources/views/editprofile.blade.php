<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Profile</title>
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

        .profile-container {
            text-align: center;
        }

        .profile-picture {
            position: relative;
            display: inline-block;
        }

        .profile-picture img {
            width: 100px;
            height: 100px;
            border-radius: 50%;
            border: 2px solid #fff;
        }

        .profile-picture .camera-icon {
            position: absolute;
            bottom: 5px;
            right: 5px;
            background-color: #fff;
            border-radius: 50%;
            padding: 2px;
            width: 20px;
            height: 20px;
            display: flex;
            justify-content: center;
            align-items: center;
        }

        .profile-form {
            margin-top: 20px;
            text-align: left;
            width: 100%;
        }

        .profile-form .form-group {
            display: flex;
            align-items: center;
            margin-bottom: 15px;
        }

        .profile-form label {
            width: 80px;
            margin-right: 10px;
        }

        .profile-form input[type="text"],
        .profile-form textarea {
            flex: 1;
            padding: 10px;
            background: transparent;
            border: 1px solid #333;
            border-radius: 5px;
            color: #fff;
        }

        .profile-form .form-actions {
            display: flex;
            justify-content: flex-end;
        }

        .profile-form button {
            background-color: #2DC4A9;
            color: #fff;
            border: none;
            padding: 10px 20px;
            border-radius: 5px;
            cursor: pointer;
        }

        .profile-form button:hover {
            background-color: #25a390;
        }
    </style>
</head>

<body>
    <div class="navbar">
        @guest
        <div class="profile-section">
            <img src="{{ asset('images/logo-medsos.png') }}" alt="Logo" class="profile-pic">
            <span>Silahkan Login Dahulu</span>
            <small>ayo login</small>
        </div>
        <a href="{{ route('login') }}"><img src="{{ asset('icons/login.png') }}" alt="Login Icon" class="icon">Login</a>
        @else
        <a href="{{ route('profile.show') }}" class="profile-section">
            <img src="{{ asset('images/profile.png') }}" alt="Profile Picture" class="profile-pic">
            <span>{{ Auth::user()->name }}</span>
        </a>
        <button onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
            <img src="{{ asset('icons/logout.png') }}" alt="Logout Icon" class="icon">Logout
        </button>
        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
            @csrf
        </form>
        <a href="{{ route('home') }}"><img src="{{ asset('icons/home.png') }}" alt="Home Icon" class="icon">Beranda</a>
        <a href="{{ route('explore') }}"><img src="{{ asset('icons/explore.png') }}" alt="Explore Icon" class="icon">Explore</a>
        <a href="{{ route('notifications') }}"><img src="{{ asset('icons/notification.png') }}" alt="Notification Icon" class="icon">Notification</a>
        <a href="{{ route('post.store') }}"><img src="{{ asset('icons/post.png') }}" alt="Post Icon" class="icon">Posting</a>
        <a href="{{ route('bookmarks') }}"><img src="{{ asset('icons/bookmarks.png') }}" alt="Bookmarks Icon" class="icon">Bookmarks</a>
        @endguest
    </div>

    <div class="content">
        <div class="main-content">
            <div class="profile-container">
                <div class="profile-picture">
                    <img src="{{ asset('images/profile.png') }}" alt="Profile Picture">
                    <label for="profile_picture" class="camera-icon">
                        <img src="{{ asset('icons/camera.png') }}" alt="Camera Icon" style="width: 16px; height: 16px;">
                    </label>
                    <input type="file" id="profile_picture" name="profile_picture" style="display: none;">
                </div>

                <form action="{{ route('profile.update') }}" method="POST" enctype="multipart/form-data" class="profile-form">
                    @csrf
                    <div class="form-group">
                        <label for="username">Username</label>
                        <input type="text" id="username" name="username" value="{{ old('username', $user->username) }}" required>
                    </div>
                    <div class="form-group">
                        <label for="name">Nama</label>
                        <input type="text" id="name" name="name" value="{{ old('name', $user->name) }}" required>
                    </div>
                    <div class="form-group">
                        <label for="bio">Bio</label>
                        <textarea id="bio" name="bio">{{ old('bio', $user->bio) }}</textarea>
                    </div>
                    <div class="form-actions">
                        <button type="submit">Save</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</body>

</html>