<!DOCTYPE html>
<html lang="id">

<head>

    <meta charset="UTF-8">
    <meta name="viewport"content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description"content="Login Admin Profil Sekolah SMK YPC">
    <title>Login | Profil Sekolah SMK YPC</title>
    <link href="{{ asset('css/font-face.css') }}"rel="stylesheet"media="all">
    <link rel="preconnect"href="https://rsms.me/">
    <link rel="stylesheet"href="https://rsms.me/inter/inter.css">
    <link href="{{ asset('vendor/fontawesome-7.3.1/css/all.min.css') }}"rel="stylesheet"media="all">
    <link href="{{ asset('vendor/bootstrap-5.3.8.min.css') }}"rel="stylesheet"media="all">
    <link href="{{ asset('asset/css/theme.css') }}"rel="stylesheet"media="all">
    <link href="{{ asset('asset/css/app.css') }}"rel="stylesheet"media="all">

    <style>

        * {
            box-sizing: border-box;
        }

        body {
            margin: 0;
            min-height: 100vh;
            font-family: 'Inter', sans-serif;
            background: #f5f6fa;
        }

        .login-wrapper {
            min-height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
            padding: 30px 15px;
            background:
                linear-gradient(
                    135deg,
                    #f5f6fa 0%,
                    #eef2fb 100%
                );
        }

        .login-card {
            width: 100%;
            max-width: 430px;
            background: #ffffff;
            border-radius: 10px;
            box-shadow:0 8px 30px rgba(0, 0, 0, 0.08);
            padding: 40px;
        }

        .login-logo {
            text-align: center;
            margin-bottom: 30px;
        }

        .login-logo-icon {
            width: 65px;
            height: 65px;
            margin: 0 auto 15px;
            display: flex;
            align-items: center;
            justify-content: center;
            background: #4272d7;
            color: #ffffff;
            border-radius: 8px;
            font-size: 28px;
            box-shadow:
                0 5px 15px rgba(66, 114, 215, 0.25);
        }

        .login-logo h3 {
            margin: 0;
            font-size: 20px;
            font-weight: 700;
            color: #333333;
        }

        .login-logo p {
            margin-top: 6px;
            margin-bottom: 0;
            font-size: 13px;
            color: #888888;
        }

        .login-form-group {
            margin-bottom: 20px;
        }

        .login-form-group label {
            display: block;
            margin-bottom: 8px;
            font-size: 14px;
            font-weight: 600;
            color: #333333;
        }

        .input-wrapper {
            position: relative;
        }

        .input-wrapper > i {
            position: absolute;
            left: 15px;
            top: 50%;
            transform: translateY(-50%);
            color: #999999;
            font-size: 15px;
            z-index: 2;
        }

        .login-input {
            width: 100%;
            height: 48px;
            padding: 0 15px 0 44px;
            border: 1px solid #dddddd;
            border-radius: 6px;
            outline: none;
            font-size: 14px;
            color: #333333;
            transition: 0.2s;
        }

        .login-input:focus {
            border-color: #4272d7;
            box-shadow: 0 0 0 3px rgba(66, 114, 215, 0.10);
        }

        .password-toggle {
            position: absolute;
            right: 14px;
            top: 50%;
            transform: translateY(-50%);
            border: none;
            background: transparent;
            color: #999999;
            cursor: pointer;
            padding: 5px;
        }

        .password-toggle:hover {
            color: #4272d7;
        }

        .password-input {
            padding-right: 45px;
        }

        .login-button {
            width: 100%;
            height: 48px;
            border: none;
            border-radius: 6px;
            background: #4272d7;
            color: #ffffff;
            font-size: 14px;
            font-weight: 600;
            cursor: pointer;
            transition: 0.2s;
        }

        .login-button:hover {
            background: #3262c7;
            box-shadow:
                0 5px 15px rgba(66, 114, 215, 0.25);
        }

        .login-alert {
            border-radius: 6px;
            font-size: 13px;
            margin-bottom: 20px;
        }

        .login-footer {
            text-align: center;
            margin-top: 25px;
            padding-top: 20px;
            border-top: 1px solid #eeeeee;
            font-size: 12px;
            color: #999999;
        }

        .login-footer strong {
            color: #4272d7;
        }

        @media (max-width: 480px) {
            .login-card {
                padding: 30px 25px;
            }
            .login-logo h3 {
                font-size: 18px;
            }
        }

    </style>
</head>

<body>

<div class="login-wrapper">
    <div class="login-card">

        <div class="login-logo">
            <div class="login-logo-icon"><img src="{{ asset('images/logo.png') }}" alt="Logo SMK YPC">
        </div>

            <h3>
                PROFIL SEKOLAH
                <span style="color: #4272d7;">
                    SMK YPC
                </span>
            </h3>
            <p>
                Admin Panel
            </p>
        </div>

        @if(session('error'))

            <div class="alert alert-danger login-alert">
                <i class="fa-solid fa-circle-exclamation me-2"></i>
                {{ session('error') }}
            </div>
        @endif


        @if($errors->any())

            <div class="alert alert-danger login-alert">
                <i class="fa-solid fa-circle-exclamation me-2"></i>
                Username atau password yang dimasukkan salah.
            </div>
        @endif

        <form
            action="{{ route('login.process') }}"
            method="POST" >
            @csrf

            <div class="login-form-group">
                <label for="username">
                    Username
                </label>

                <div class="input-wrapper">
                    <i class="fa-solid fa-user"></i>

                    <input
                        type="text"
                        id="username"
                        name="username"
                        class="login-input"
                        placeholder="Masukkan username"
                        value="{{ old('username') }}"
                        required
                        autofocus>
                </div>
            </div>

            <div class="login-form-group">
                <label for="password">
                    Password
                </label>

                <div class="input-wrapper">
                    <i class="fa-solid fa-lock"></i>
                    <input
                        type="password"
                        id="password"
                        name="password"
                        class="login-input password-input"
                        placeholder="Masukkan password"
                        required >
                    <button
                        type="button"
                        class="password-toggle"
                        onclick="togglePassword()"
                        aria-label="Tampilkan password" >
                        <i
                            class="fa-solid fa-eye"
                            id="passwordIcon"
                        ></i>
                    </button>
                </div>
            </div>

            <button
                type="submit"
                class="login-button" >

                <i class="fa-solid fa-right-to-bracket me-2"></i>
                Login
            </button>

        </form>

        <div class="login-footer">
            Copyright © {{ date('Y') }}
            <strong>SMK YPC</strong>.
            All rights reserved.
        </div>

    </div>

</div>


<script>

    function togglePassword() {

        const password =
            document.getElementById('password');

        const icon =
            document.getElementById('passwordIcon');


        if (password.type === 'password') {
            password.type = 'text';
            icon.classList.remove('fa-eye');
            icon.classList.add('fa-eye-slash');
        } else {

            password.type = 'password';
            icon.classList.remove('fa-eye-slash');
            icon.classList.add('fa-eye');

        }

    }

</script>


</body>

</html>
