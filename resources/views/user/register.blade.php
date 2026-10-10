<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register</title>
    <!-- Google Font: Poppins -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600&display=swap" rel="stylesheet">
    <!-- Bootstrap 5 -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="/css/login.css">
</head>
<body>
<div class="container-fluid min-vh-100 d-flex justify-content-center align-items-center py-4">
    <div class="login-card">
        <!-- Title -->
        <h2 class="text-center">Register Form</h2>
        <!-- Form -->
        <form method="POST" action="{{ route('register.post') }}">
            @csrf
            <!-- Name -->
            <div class="mb-4">
                <label class="form-label">Name</label>
                <input type="text" name="name" class="form-control custom-input" value="{{ old('name') }}" placeholder="please input your name" required>
            </div>
            <!-- Email Address -->
            <div class="mb-4">
                <label class="form-label">Email address</label>
                <input type="email" name="email" class="form-control custom-input" value="{{ old('email') }}" placeholder="adminwoman@gmail.com" required>
            </div>
            <!-- Password -->
            <div class="mb-4">
                <label class="form-label">Password</label>
                <input type="password" name="password" class="form-control custom-input" placeholder="•••••" required>
            </div>
            <!-- Button -->
            <div class="text-center mt-5">
                <button type="submit" class="btn login-btn">
                    Register
                </button>
            </div>
            <!-- Already have an account? -->
            <p class="text-center register-text">
                Already have an account? 
                <a href="/login" class="fw-bold ms-1">Login</a>
            </p>
        </form>
    </div>
</div>
<!-- Bootstrap JS -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>

</body>
</html>