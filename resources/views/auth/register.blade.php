<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register</title>
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <style>
        body {
            margin: 0;
            padding: 0;
            background-color: #000;
            color: #fff;
            display: flex;
            height: 100vh;
            font-family: 'Arial', sans-serif;
        }

        .register-container {
            display: flex;
            flex: 1;
            align-items: center;
            justify-content: center;
        }

        .register-box {
            display: flex;
            align-items: center;
            justify-content: center;
            width: 80%;
        }

        .register-logo {
            margin-right: 50px;
        }

        .register-logo img {
            width: 200px;
        }

        .register-form {
            background-color: #111;
            padding: 40px;
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.5);
            width: 100%;
            max-width: 600px;
        }

        .register-form h2 {
            margin-bottom: 20px;
        }

        .register-form label {
            display: block;
            margin-bottom: 5px;
            font-weight: bold;
        }

        .register-form .form-group {
            margin-bottom: 20px;
        }

        .register-form input[type="text"],
        .register-form input[type="email"],
        .register-form input[type="password"] {
            width: 100%;
            padding: 10px;
            border: none;
            border-radius: 5px;
            margin-bottom: 10px;
        }

        .register-form .password-toggle {
            position: absolute;
            top: 50%;
            right: 10px;
            transform: translateY(-50%);
            cursor: pointer;
        }

        .register-form button {
            width: 100%;
            padding: 10px;
            background-color: #fff;
            color: #000;
            border: none;
            border-radius: 5px;
            cursor: pointer;
        }

        .register-form button:hover {
            background-color: #ddd;
        }

        .row {
            display: flex;
            justify-content: space-between;
        }

        .col-md-6 {
            width: 48%;
        }
    </style>
</head>

<body>
    <div class="register-container">
        <div class="register-box">
            <div class="register-logo">
                <img src="{{ asset('images/logo-medsos.png') }}" alt="Logo">
            </div>
            <div class="register-form">
                <h2>Register</h2>
                <form method="POST" action="{{ route('register') }}">
                    @csrf
                    <div class="form-group row">
                        <div class="col-md-6">
                            <label for="username">Username</label>
                            <input type="text" id="username" name="username" placeholder="Masukan Username" required>
                        </div>
                        <div class="col-md-6">
                            <label for="name">Name</label>
                            <input type="text" id="name" name="name" placeholder="Masukan Name" required>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="email">E-Mail</label>
                        <input type="email" id="email" name="email" placeholder="Masukan E-Mail" required>
                    </div>
                    <div class="form-group" style="position:relative;">
                        <label for="password">Password 👁️‍🗨️</label>
                        <input type="password" id="password" name="password" placeholder="Masukan Password" required>
                        <span class="password-toggle" onclick="togglePassword('password')">
                            <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="#fff" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                <path d="M20.39 9.61a10 10 0 1 1-12.78 0M12 2a2 2 0 0 1 2 2c-.097-.038-.195-.074-.293-.109m1.44 4.865c-3.905-.616-7.29 2.078-6.674 5.983.617 3.905 5.97 5.817 9.403 3.98 3.904-.616 7.289-2.078 6.673-5.983-.24-1.513-.896-2.866-1.848-3.891" />
                                <circle cx="12" cy="12" r="3" />
                            </svg>
                        </span>
                    </div>
                    <div class="form-group" style="position:relative;">
                        <label for="password_confirmation">Confirm Password 👁️‍🗨️</label>
                        <input type="password" id="password_confirmation" name="password_confirmation" placeholder="Masukan Confirm Password" required>
                        <span class="password-toggle" onclick="togglePassword('password_confirmation')">
                            <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="#fff" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                <path d="M20.39 9.61a10 10 0 1 1-12.78 0M12 2a2 2 0 0 1 2 2c-.097-.038-.195-.074-.293-.109m1.44 4.865c-3.905-.616-7.29 2.078-6.674 5.983.617 3.905 5.97 5.817 9.403 3.98 3.904-.616 7.289-2.078 6.673-5.983-.24-1.513-.896-2.866-1.848-3.891" />
                                <circle cx="12" cy="12" r="3" />
                            </svg>
                        </span>
                    </div>
                    <button type="submit">Register</button>
                </form>
            </div>
        </div>
    </div>

    <script>
        function togglePassword(id) {
            var x = document.getElementById(id);
            if (x.type === "password") {
                x.type = "text";
            } else {
                x.type = "password";
            }
        }
    </script>
</body>

</html>