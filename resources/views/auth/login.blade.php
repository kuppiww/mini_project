<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <style>
        body {
            margin: 0;
            padding: 0;
            background-color: #000;
            color: #fff;
            display: flex;
            flex-direction: column;
            height: 100vh;
            font-family: 'Arial', sans-serif;
        }

        .login-container {
            display: flex;
            flex: 1;
            align-items: center;
            justify-content: center;
        }

        .login-box {
            display: flex;
            align-items: center;
            justify-content: center;
        }

        .login-logo {
            margin-right: 50px;
        }

        .login-logo img {
            width: 100px;
        }

        .login-form {
            background-color: #111;
            padding: 40px;
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.5);
        }

        .login-form h2 {
            margin-bottom: 20px;
        }

        .login-form input[type="text"],
        .login-form input[type="password"] {
            width: 100%;
            padding: 10px;
            margin-bottom: 20px;
            border: none;
            border-radius: 5px;
        }

        .login-form button {
            width: 100%;
            padding: 10px;
            background-color: #fff;
            color: #000;
            border: none;
            border-radius: 5px;
            cursor: pointer;
        }

        .login-form button:hover {
            background-color: #ddd;
        }

        .register-link {
            text-align: center;
            margin-top: 10px;
        }

        .register-link a {
            color: #fff;
            text-decoration: underline;
        }

        .about-section {
            background-color: #fff;
            color: #000;
            padding: 20px;
            text-align: center;
        }
    </style>
</head>

<body>
    <div class="login-container">
        <div class="login-box">
            <div class="login-logo">
                <img src="{{ asset('images/logo-medsos.png') }}" alt="Logo">
            </div>
            <div class="login-form">
                <h2>Login</h2>
                <form method="POST" action="{{ route('login_user') }}">
                    @csrf
                    <label for="username">Username</label>
                    <input type="text" id="username" name="username" placeholder="Masukan Username" required>
                    <label for="password">Password</label>
                    <input type="password" id="password" name="password" placeholder="Masukan Password" required>
                    <button type="submit">Login</button>
                </form>
                <div class="register-link">
                    Belum punya akun? <a href="{{ route('register') }}">Register</a>
                </div>
            </div>
        </div>
    </div>
    <div class="about-section">
        <h2>About This Website</h2>
        <p>Welcome to our social media platform where you can share photos, follow friends, and much more.</p>
    </div>
</body>

</html>