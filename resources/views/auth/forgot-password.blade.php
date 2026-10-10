<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Forgot Password</title>

    <!-- Bootstrap 5 CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Bootstrap Icons -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <!--  CSS -->
    <link rel="stylesheet" href="{{ asset('css/login.css') }}">
</head>
<body>
<div class="container-fluid min-vh-100 d-flex justify-content-center align-items-center">
    <div class="login-card">
        <h2 class="text-center mb-3">Forgot Password</h2>

        <p class="text-center text-white-50 mb-4" style="font-size: 13px; line-height: 1.5;">
            Forgot your password? No problem. Just let us know your email address and we will email you a password reset link.
        </p>

        <!-- Session Status  -->
        @if (session('status'))
            <div class="alert alert-success py-2 mb-3 text-center" style="font-size: 13px;">
                {{ session('status') }}
            </div>
        @endif
        
        @if($errors->any())
            <div class="alert alert-danger py-2 mb-3 text-center" style="font-size: 13px;">
                {{ $errors->first() }}
            </div>
        @endif

        <form action="{{ route('password.email') }}" method="POST">
            @csrf

            <!-- Email -->
            <div class="input-group-custom mb-4">
                <label class="form-label">Email address</label>
                <input
                    type="email"
                    name="email"
                    class="form-control custom-input"
                    value="{{ old('email') }}"
                    required
                    autofocus
                    autocomplete="username"
                >
            </div>

            <!-- Submit Button -->
            <div class="text-center mt-4">
                <button type="submit" class="btn login-btn">
                    Email Password Reset Link
                </button>
            </div>

            <!-- Back to Login -->
            <p class="text-center register-text mt-4 mb-0">
                Remember your password?
                <a href="{{ route('login') }}" class="fw-bold ms-1">Log in</a>
            </p>
        </form>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>