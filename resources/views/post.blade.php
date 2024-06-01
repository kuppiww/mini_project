<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Posting</title>
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <style>
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

        .post-box {
            background-color: #222;
            padding: 20px;
            border-radius: 8px;
            position: relative;
            margin: 0 auto;
            margin-top: 20px;
            max-width: 600px;
            text-align: left;
        }

        .post-box .profile-pic-small {
            width: 40px;
            height: 40px;
            border-radius: 50%;
            margin-right: 10px;
            vertical-align: middle;
        }

        .post-box .account-info {
            display: flex;
            align-items: center;
            margin-bottom: 10px;
        }

        .post-box .account-name {
            font-weight: bold;
        }

        .post-box .options {
            position: absolute;
            top: 20px;
            right: 20px;
            cursor: pointer;
        }

        .post-box textarea {
            width: 100%;
            padding: 10px;
            margin-top: 10px;
            background-color: #333;
            border: 1px solid #555;
            border-radius: 5px;
            color: #fff;
            resize: none;
        }

        .upload-box {
            background-color: #333;
            padding: 20px;
            border-radius: 5px;
            text-align: center;
            margin-top: 20px;
            cursor: pointer;
        }

        .upload-box:hover {
            background-color: #444;
        }

        .post-box .separator {
            border-top: 1px solid #555;
            margin: 20px 0;
        }

        .post-box .post-button {
            background-color: #2DC4A9;
            color: #fff;
            border: none;
            padding: 10px 20px;
            border-radius: 5px;
            cursor: pointer;
        }

        .post-box .post-button:hover {
            background-color: #28b195;
        }

        .image-preview {
            margin-top: 20px;
            text-align: center;
        }

        .image-preview img {
            max-width: 100%;
            border-radius: 5px;
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
            <div class="button-container">
                <button class="btn-custom">For You</button>
                <button class="btn-custom">Following</button>
            </div>
            <div class="post-box">
                <div class="account-info">
                    <img src="{{ asset('images/profile.png') }}" alt="Profile Picture" class="profile-pic-small">
                    <div class="account-name">{{ Auth::user()->name }}</div>
                </div>
                <div class="options">...</div>
                <textarea placeholder="Deskripsi postingan" style="width: 95%;"></textarea>
                <div class="upload-box" onclick="document.getElementById('image-upload').click();">Pilih gambar</div>
                <input type="file" id="image-upload" name="image" accept="image/*" style="display: none;" onchange="previewImage(event)">
                <div class="image-preview" id="image-preview">
                    <!-- Image preview will be displayed here -->
                </div>
                <div class="separator"></div>
                <button class="post-button" data-home-url="{{ route('home') }}" onclick="postContent(this)">Posting</button>
            </div>
        </div>
    </div>
    <script>
        function previewImage(event) {
            var reader = new FileReader();
            reader.onload = function() {
                var output = document.getElementById('image-preview');
                output.innerHTML = '<img src="' + reader.result + '" alt="Image Preview">';
            }
            reader.readAsDataURL(event.target.files[0]);
        }

        function postContent(button) {
            var homeUrl = button.getAttribute('data-home-url');
            // Implement the actual post submission logic here
            window.location.href = homeUrl;
        }

        function addBookmark(post) {
            let bookmarks = JSON.parse(localStorage.getItem('bookmarks')) || [];
            bookmarks.push(post);
            localStorage.setItem('bookmarks', JSON.stringify(bookmarks));
        }

        function loadBookmarks() {
            let bookmarks = JSON.parse(localStorage.getItem('bookmarks')) || [];
            const bookmarksList = document.getElementById('bookmarks-list');

            bookmarks.forEach(bookmark => {
                const bookmarkItem = document.createElement('div');
                bookmarkItem.classList.add('bookmark-item');

                bookmarkItem.innerHTML = `
                    <img src="${bookmark.profilePic}" alt="Profile Picture">
                    <div class="bookmark-info">
                        <h4>${bookmark.name}</h4>
                        <p>${bookmark.description}</p>
                    </div>
                `;

                bookmarksList.appendChild(bookmarkItem);
            });
        }

        document.addEventListener('DOMContentLoaded', function() {
            loadBookmarks();
        });
    </script>
</body>

</html>