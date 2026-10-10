<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>

    <!-- Bootstrap 5 CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Bootstrap Icons -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <!-- Custom CSS -->
    <link rel="stylesheet" href="/css/login.css">
</head>
<body>
<div class="container-fluid min-vh-100 d-flex justify-content-center align-items-center">
    <div class="login-card">
        <h2 class="text-center mb-4">Login</h2>

        <form action="{{ url('/login') }}" method="POST">
            @csrf 

            @if($errors->any())
                <div class="alert alert-danger py-2 mb-3">
                    {{ $errors->first() }}
                </div>
            @endif

            <!-- Email -->
            <div class="input-group-custom mb-4">
                <label class="form-label">Email address</label>
                <input
                    type="email"
                    name="email"
                    class="form-control custom-input"
                    value="{{ old('email') }}"
                    required
                    autocomplete="off"
                >
            </div>

            <!-- Password -->
            <div class="input-group-custom mb-4 position-relative">
                <label class="form-label">Password</label>
                <input
                    type="password"
                    name="password"
                    id="passwordInput"
                    class="form-control custom-input pe-4"
                    required
                >
                <i class="bi bi-eye password-toggle-icon" id="togglePassword"></i>
            </div>

            <!-- Remember & Forgot Password -->
            <div class="d-flex justify-content-between align-items-center mb-4 text-options">
                <div class="form-check p-0 d-flex align-items-center">
                    <input
                        class="form-check-input mt-0"
                        type="checkbox"
                        name="remember"
                        id="remember"
                    >
                    <label class="form-check-label ms-2" for="remember">
                        Remember Me
                    </label>
                </div>
                <a href="#" class="link-light">Forgot Password?</a>
            </div>

            <div class="text-center mt-4">
                <button type="submit" class="btn login-btn">
                    Log in
                </button>
            </div>

            <p class="text-center register-text mt-4 mb-0">
                Don't have an account? <a href="register" class="fw-bold ms-1">Register</a>
            </p>
        </form>
    </div>
</div>

<!-- Bootstrap JS -->
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