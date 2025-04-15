<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="author" content="Yinka Enoch Adedokun">
    <link rel="shortcut icon" type="image/x-icon" href="{{ asset('images/favicon-1.png') }}"> 
    <title>Socialx - Login</title>
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" type="text/css" href="{{ asset('css/bootstrap.min.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('css/style.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('css/custom.css') }}">
</head>
<body>
    <!-- Main Content -->
    <div class="container-fluid">
        <div class="row justify-content-center align-items-center min-vh-100">
            <div class="main-content">
                <!-- Company Info Section -->
                <div class="company__info">
                    <span class="company__logo">
                        <h2><i class="fa fa-android"></i></h2>
                    </span>
                    <h4>Socialx</h4>
                </div>
                 <!-- Validation Errors -->
                        @if ($errors->any())
                            <div class="alert alert-danger">
                                <ul class="mb-0">
                                    @foreach ($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif
                <!-- Login Form Section -->
                <div class="login_form">
                    <div class="container-fluid">
                        <div class="row">
                            <h2>Sign In</h2>
                        </div>
                        <form class="form-group" method="POST" action="{{ route('login') }}" class="form-group">
                            @csrf
                            <!-- Email Input -->
                            <div class="row mb-3">
                                <input type="email" name="email" id="email" class="form__input" placeholder="Email" value="{{ old('email') }}" required>
                            </div>
                            <!-- Password Input -->
                            <div class="row mb-3">
                                <input type="password" name="password" id="password" class="form__input" placeholder="Password" required>
                            </div>
                            <!-- Remember Me Checkbox -->
                            <div class="row mb-3">
                                <div class="form-check">
                                    <input type="checkbox" name="remember" id="remember_me" class="form-check-input">
                                    <label for="remember_me" class="form-check-label">Remember Me</label>
                                </div>
                            </div>
                            <!-- Submit Button -->
                            <div class="row mb-3">
                                <button type="submit" class="btn btn-custom">Log In</button>
                            </div>
                        </form>
                        <!-- Register Link -->
                        <div class="row">
                            <p>Don't have an account? <a href="{{ route('register') }}" class="register-link">Register Here</a></p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Bootstrap JS -->
    <script src="{{ asset('js/bootstrap.bundle.min.js') }}"></script>
</body>
</html>