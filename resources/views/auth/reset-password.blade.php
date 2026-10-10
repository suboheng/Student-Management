<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Reset Password</title>

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
        <h2 class="text-center mb-4">Reset Password</h2>

        @if($errors->any())
            <div class="alert alert-danger py-2 mb-3 text-center" style="font-size: 13px;">
                {{ $errors->first() }}
            </div>
        @endif

        <form action="{{ route('password.store') }}" method="POST">
            @csrf

            <!-- Password Reset Token -->
            <input type="hidden" name="token" value="{{ $request->route('token') }}">

            <!-- Email -->
            <div class="input-group-custom mb-4">
                <label class="form-label">Email address</label>
                <input
                    type="email"
                    name="email"
                    class="form-control custom-input"
                    value="{{ old('email', $request->email) }}"
                    required
                    autofocus
                    autocomplete="username"
                >
            </div>

            <!-- Password -->
            <div class="input-group-custom mb-4 position-relative">
                <label class="form-label">New Password</label>
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

            <!-- Confirm Password -->
            <div class="input-group-custom mb-4 position-relative">
                <label class="form-label">Confirm Password</label>
                <input
                    type="password"
                    name="password_confirmation"
                    id="confirmPasswordInput"
                    class="form-control custom-input pe-4"
                    required
                    autocomplete="new-password"
                >
                <i class="bi bi-eye password-toggle-icon" id="toggleConfirmPassword"></i>
            </div>

            <!-- Button -->
            <div class="text-center mt-4">
                <button type="submit" class="btn login-btn">
                    Reset Password
                </button>
            </div>
        </form>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
<script>
    document.addEventListener('DOMContentLoaded', function () {
        function setupToggle(toggleId, inputId) {
            const toggle = document.querySelector(toggleId);
            const input = document.querySelector(inputId);
            if (toggle && input) {
                toggle.addEventListener('click', function () {
                    const type = input.getAttribute('type') === 'password' ? 'text' : 'password';
                    input.setAttribute('type', type);
                    this.classList.toggle('bi-eye');
                    this.classList.toggle('bi-eye-slash');
                });
            }
        }
        setupToggle('#togglePassword', '#passwordInput');
        setupToggle('#toggleConfirmPassword', '#confirmPasswordInput');
    });
</script>
</body>
</html>