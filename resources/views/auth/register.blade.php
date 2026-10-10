<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register</title>

    <!-- Bootstrap 5 CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Bootstrap Icons -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <!-- CSS  Login -->
    <link rel="stylesheet" href="{{ asset('css/login.css') }}">
</head>
<body>
<div class="container-fluid min-vh-100 d-flex justify-content-center align-items-center py-4">
    <div class="login-card">
        <h2 class="text-center mb-4">Register Form</h2>

        <form method="POST" action="{{ route('register') }}">
            @csrf

            @if($errors->any())
                <div class="alert alert-danger py-2 mb-3" style="font-size: 13px;">
                    {{ $errors->first() }}
                </div>
            @endif

            <!-- Name -->
            <div class="input-group-custom mb-3">
                <label class="form-label">Name</label>
                <input 
                    type="text" 
                    name="name" 
                    class="form-control custom-input" 
                    value="{{ old('name') }}" 
                    required 
                    autofocus 
                    autocomplete="name"
                >
            </div>

            <!-- Email Address -->
            <div class="input-group-custom mb-3">
                <label class="form-label">Email address</label>
                <input 
                    type="email" 
                    name="email" 
                    class="form-control custom-input" 
                    value="{{ old('email') }}" 
                    required 
                    autocomplete="username"
                >
            </div>

            <!-- Password -->
            <div class="input-group-custom mb-3 position-relative">
                <label class="form-label">Password</label>
                <input 
                    type="password" 
                    name="password" 
                    id="passwordInput" 
                    class="form-control custom-input pe-4" 
                    required 
                    autocomplete="new-password"
                >
                <i class="bi bi-eye password-toggle-icon" id="togglePassword"></i>
            </div>

            <!-- Confirm Password (Laravel Breeze 验证所必需) -->
            <div class="input-group-custom mb-4 position-relative">
                <label class="form-label">Confirm Password</label>
                <input 
                    type="password" 
                    name="password_confirmation" 
                    id="passwordConfirmInput" 
                    class="form-control custom-input pe-4" 
                    required 
                    autocomplete="new-password"
                >
                <i class="bi bi-eye password-toggle-icon" id="toggleConfirmPassword"></i>
            </div>

            <div class="text-center mt-4">
                <button type="submit" class="btn login-btn">
                    Register
                </button>
            </div>

            <p class="text-center register-text mt-4 mb-0">
                Already have an account? 
                <a href="{{ route('login') }}" class="fw-bold ms-1">Login</a>
            </p>
        </form>
    </div>
</div>

<!-- Bootstrap JS -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>

<script>
    document.addEventListener('DOMContentLoaded', function () {
        function setupToggle(iconId, inputId) {
            const toggleIcon = document.querySelector(iconId);
            const passwordInput = document.querySelector(inputId);
            
            if (toggleIcon && passwordInput) {
                toggleIcon.addEventListener('click', function () {
                    const type = passwordInput.getAttribute('type') === 'password' ? 'text' : 'password';
                    passwordInput.setAttribute('type', type);
                    this.classList.toggle('bi-eye');
                    this.classList.toggle('bi-eye-slash');
                });
            }
        }

        setupToggle('#togglePassword', '#passwordInput');
        setupToggle('#toggleConfirmPassword', '#passwordConfirmInput');
    });
</script>
</body>
</html>