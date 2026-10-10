<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Confirm Password</title>

    <!-- Bootstrap 5 CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Bootstrap Icons -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <!-- CSS -->
    <link rel="stylesheet" href="{{ asset('css/login.css') }}">
</head>
<body>
<div class="container-fluid min-vh-100 d-flex justify-content-center align-items-center">
    <div class="login-card">
        <h2 class="text-center mb-3">Confirm Password</h2>

        <p class="text-center text-white-50 mb-4" style="font-size: 13px; line-height: 1.5;">
            This is a secure area of the application. Please confirm your password before continuing.
        </p>

        @if($errors->any())
            <div class="alert alert-danger py-2 mb-3 text-center" style="font-size: 13px;">
                {{ $errors->first() }}
            </div>
        @endif

        <form action="{{ route('password.confirm') }}" method="POST">
            @csrf

            <!-- Password -->
            <div class="input-group-custom mb-4 position-relative">
                <label class="form-label">Password</label>
                <input
                    type="password"
                    name="password"
                    id="passwordInput"
                    class="form-control custom-input pe-4"
                    required
                    autocomplete="current-password"
                >
                <i class="bi bi-eye password-toggle-icon" id="togglePassword"></i>
            </div>

            <!-- Button -->
            <div class="text-center mt-4">
                <button type="submit" class="btn login-btn">
                    Confirm
                </button>
            </div>
        </form>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
<script>
    document.addEventListener('DOMContentLoaded', function () {
        const togglePassword = document.querySelector('#togglePassword');
        const passwordInput = document.querySelector('#passwordInput');
        if (togglePassword && passwordInput) {
            togglePassword.addEventListener('click', function () {
                const type = passwordInput.getAttribute('type') === 'password' ? 'text' : 'password';
                passwordInput.setAttribute('type', type);
                this.classList.toggle('bi-eye');
                this.classList.toggle('bi-eye-slash');
            });
        }
    });
</script>
</body>
</html>
