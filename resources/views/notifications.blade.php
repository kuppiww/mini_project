<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Notifikasi</title>
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <style>
        /* Styles from previous code */
        body {
            background-color: #000;
            color: #fff;
            font-family: 'Arial', sans-serif;
            margin: 0;
            padding: 0;
            display: flex;
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
            margin-top: 20px;
            padding: 20px;
            flex: 1;
        }

        .main-content {
            text-align: center;
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
            cursor: pointer;
        }

        .btn-custom:hover {
            background-color: #ddd;
        }

        .notification-box {
            background-color: #222;
            padding: 20px;
            border-radius: 8px;
            position: relative;
            margin: 0 auto;
            margin-top: 20px;
            max-width: 600px;
            text-align: left;
        }

        .notification-box .account-info {
            display: flex;
            align-items: center;
            margin-bottom: 10px;
        }

        .notification-box .profile-pic-small {
            width: 40px;
            height: 40px;
            border-radius: 50%;
            margin-right: 10px;
        }

        .notification-box .account-name {
            font-weight: bold;
            margin-left: 10px;
        }

        .notification-box .options {
            position: absolute;
            top: 20px;
            right: 20px;
            cursor: pointer;
        }

        .notification-navbar {
            display: flex;
            justify-content: center;
            margin-bottom: 20px;
        }

        .notification-navbar button {
            background-color: #444;
            color: #fff;
            border: none;
            padding: 10px 20px;
            margin: 5px;
            border-radius: 5px;
            cursor: pointer;
        }

        .notification-navbar button:hover {
            background-color: #555;
        }

        .notification-navbar button.active {
            background-color: #2DC4A9;
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
        <a href="{{ route('login') }}">
            <img src="{{ asset('icons/login.png') }}" alt="Login Icon" class="icon">Login
        </a>
        @else
        <a href="{{ route('profile.show') }}" class="profile-section">
            <img src="{{ asset('images/profile.png') }}" alt="Profile Picture" class="profile-pic">
            <span>{{ Auth::user()->name }}</span>
        </a>

        <a href="{{ route('home') }}">
            <img src="{{ asset('icons/home.png') }}" alt="Home Icon" class="icon">Beranda
        </a>
        <a href="{{ route('explore') }}">
            <img src="{{ asset('icons/explore.png') }}" alt="Explore Icon" class="icon">Explore
        </a>
        <a href="{{ route('notifications') }}">
            <img src="{{ asset('icons/notification.png') }}" alt="Notification Icon" class="icon">Notification
        </a>
        <a href="{{ route('post.store') }}">
            <img src="{{ asset('icons/post.png') }}" alt="Post Icon" class="icon">Posting
        </a>
        <a href="{{ route('bookmarks') }}">
            <img src="{{ asset('icons/bookmarks.png') }}" alt="Bookmarks Icon" class="icon">Bookmarks
        </a>

        <button onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
            <img src="{{ asset('icons/logout.png') }}" alt="Logout Icon" class="icon">Logout
        </button>
        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
            @csrf
        </form>
        @endguest
    </div>

    <div class="content">
        <div class="main-content">
            <div class="logo-container">
                <img src="{{ asset('images/logo-medsos.png') }}" alt="Logo" width="50">
            </div>
            <h1>Notifikasi</h1>
            <div class="notification-navbar">
                <button class="active" onclick="showNotifications('all')">Semua</button>
                <button onclick="showNotifications('comments')">Komentar</button>
                <button onclick="showNotifications('likes')">Disukai</button>
            </div>
            <div id="notification-content" class="notification-box">
                <p>Semua Notifikasi</p>
                <div class="notification-item">
                    <div class="account-info">
                        <img src="{{ asset('images/profile.png') }}" alt="Profile Picture" class="profile-pic-small">
                        <div class="account-name">Akun1</div>
                        <span>mulai mengikuti Anda</span>
                    </div>
                </div>
                <div class="notification-item">
                    <div class="account-info">
                        <img src="{{ asset('images/profile.png') }}" alt="Profile Picture" class="profile-pic-small">
                        <div class="account-name">Akun2</div>
                        <span>menyukai postingan Anda</span>
                    </div>
                </div>
                <div class="notification-item">
                    <div class="account-info">
                        <img src="{{ asset('images/profile.png') }}" alt="Profile Picture" class="profile-pic-small">
                        <div class="account-name">Akun3</div>
                        <span>mengomentari postingan Anda</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script>
        function showNotifications(type) {
            var content = document.getElementById('notification-content');
            content.innerHTML = '';
            var buttons = document.querySelectorAll('.notification-navbar button');
            buttons.forEach(button => button.classList.remove('active'));
            if (type === 'all') {
                content.innerHTML = `
                    <p>Semua Notifikasi</p>
                    <div class="notification-item">
                        <div class="account-info">
                            <img src="{{ asset('images/profile.png') }}" alt="Profile Picture" class="profile-pic-small">
                            <div class="account-name">Akun1</div>
                            <span>mulai mengikuti Anda</span>
                        </div>
                    </div>
                    <div class="notification-item">
                        <div class="account-info">
                            <img src="{{ asset('images/profile.png') }}" alt="Profile Picture" class="profile-pic-small">
                            <div class="account-name">Akun2</div>
                            <span>menyukai postingan Anda</span>
                        </div>
                    </div>
                    <div class="notification-item">
                        <div class="account-info">
                            <img src="{{ asset('images/profile.png') }}" alt="Profile Picture" class="profile-pic-small">
                            <div class="account-name">Akun3</div>
                            <span>mengomentari postingan Anda</span>
                        </div>
                    </div>
                `;
                document.querySelector('.notification-navbar button:nth-child(1)').classList.add('active');
            } else if (type === 'comments') {
                content.innerHTML = `
                    <p>Notifikasi Komentar</p>
                    <div class="notification-item">
                        <div class="account-info">
                            <img src="{{ asset('images/profile.png') }}" alt="Profile Picture" class="profile-pic-small">
                            <div class="account-name">Akun3</div>
                            <span>mengomentari postingan Anda</span>
                        </div>
                    </div>
                `;
                document.querySelector('.notification-navbar button:nth-child(2)').classList.add('active');
            } else if (type === 'likes') {
                content.innerHTML = `
                    <p>Notifikasi Disukai</p>
                    <div class="notification-item">
                        <div class="account-info">
                            <img src="{{ asset('images/profile.png') }}" alt="Profile Picture" class="profile-pic-small">
                            <div class="account-name">Akun2</div>
                            <span>menyukai postingan Anda</span>
                        </div>
                    </div>
                `;
                document.querySelector('.notification-navbar button:nth-child(3)').classList.add('active');
            }
        }
    </script>
</body>

</html>