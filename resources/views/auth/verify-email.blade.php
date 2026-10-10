<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Verify Email</title>

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
        <h2 class="text-center mb-3">Verify Email</h2>

        <p class="text-center text-white-50 mb-3" style="font-size: 13px; line-height: 1.5;">
            Thanks for signing up! Before getting started, could you verify your email address by clicking on the link we just emailed to you?
        </p>

        @if (session('status') == 'verification-link-sent')
            <div class="alert alert-success py-2 mb-3 text-center" style="font-size: 13px;">
                A new verification link has been sent to your email address.
            </div>
        @endif

        <form action="{{ route('verification.send') }}" method="POST">
            @csrf
            <div class="text-center mt-4">
                <button type="submit" class="btn login-btn">
                    Resend Verification Email
                </button>
            </div>
        </form>

        <form action="{{ route('logout') }}" method="POST" class="text-center mt-3">
            @csrf
            <button type="submit" class="btn btn-link link-light text-decoration-none" style="font-size: 13px;">
                Log Out
            </button>
        </form>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>