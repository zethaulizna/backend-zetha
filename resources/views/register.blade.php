<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Create Account - UPN Veteran Jawa Timur</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css">
    <link href="{{ asset('css/login.css') }}" rel="stylesheet">
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Poppins:wght@400;500&display=swap');
    </style>
</head>

<body>
    <div class="login-container">
        <div class="header-text">
            <h2>UPN VETERAN JAWA TIMUR</h2>
            <p>Lab Insyde</p>
        </div>

        @if (session('error'))
            <p style="color: red; text-align: center;">{{ session('error') }}</p>
        @endif

        @if ($errors->any())
    <div style="color: red; font-size: 13px;">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

@if (session('success'))
    <p style="color: green; text-align: center;">{{ session('success') }}</p>
@endif

        <form action="{{ route('register') }}" method="POST">
            @csrf
            <div class="mb-3">
                <label for="username" class="form-label">Username</label>
                <input type="text" class="form-control" name="username" placeholder="Enter a username" required>
            </div>

            <div class="mb-3">
                <label for="email" class="form-label">Email</label>
                <input type="email" class="form-control" name="email" id="email" placeholder="Enter your email" required>
                <div id="email-error" class="text-danger mt-1" style="font-size: 12px; display: none;"></div>
            </div>

            <div class="mb-3">
    <label for="password" class="form-label">Password</label>
    <div class="input-group">
        <input type="password" class="form-control" name="password" id="password" placeholder="Create a password" required>
        <span class="input-group-text" id="togglePassword" style="cursor: pointer; background-color: transparent;">
            <svg id="eyeIcon" xmlns="http://www.w3.org/2000/svg" width="18" height="18" fill="none" stroke="#555" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-eye" viewBox="0 0 24 24">
                <path d="M1 12s4-8 11-8 11 8 11 8-4 8-11 8-11-8-11-8z"></path>
                <circle cx="12" cy="12" r="3"></circle>
            </svg>
        </span>
    </div>
</div>

<div class="mb-3">
    <label for="confirm_password" class="form-label">Confirm Password</label>
    <div class="input-group">
        <input type="password" class="form-control" name="confirm_password" id="confirm_password" placeholder="Confirm your password" required>
        <span class="input-group-text" id="toggleConfirmPassword" style="cursor: pointer; background-color: transparent;">
            <svg id="eyeIconConfirm" xmlns="http://www.w3.org/2000/svg" width="18" height="18" fill="none" stroke="#555" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-eye" viewBox="0 0 24 24">
                <path d="M1 12s4-8 11-8 11 8 11 8-4 8-11 8-11-8-11-8z"></path>
                <circle cx="12" cy="12" r="3"></circle>
            </svg>
        </span>
    </div>
    <div id="password-error" class="text-danger mt-1" style="font-size: 12px; display: none;"></div>
</div>



            <div class="d-flex justify-content-between mb-3 form-links">
                <a href="{{ route('login') }}" class="text-decoration-none">Back to Login</a>
            </div>

            <button type="submit" name="register" class="btn btn-primary w-100">Create Account</button>
        </form>
    </div>

 <script>
        const toggle = document.getElementById('togglePassword');
        const password = document.getElementById('password');
        const eyeIcon = document.getElementById('eyeIcon');

        let show = false;

        const eyeOpen = `
            <path d="M1 12s4-8 11-8 11 8 11 8-4 8-11 8-11-8-11-8z"></path>
            <circle cx="12" cy="12" r="3"></circle>
        `;

        const eyeClosed = `
            <path d="M1 1l22 22"></path>
            <path d="M9.88 9.88a3 3 0 0 0 4.24 4.24"></path>
            <path d="M12 12a3 3 0 0 1 3 3"></path>
        `;

        toggle.addEventListener('click', () => {
            show = !show;
            password.type = show ? 'text' : 'password';
            eyeIcon.innerHTML = show ? eyeClosed : eyeOpen;
        });

        // Email dan password validation
        const form = document.querySelector('form');
        const email = document.getElementById('email');
        const emailError = document.getElementById('email-error');
        const confirmPassword = document.getElementById('confirm_password');
        const passwordError = document.getElementById('password-error');

        form.addEventListener('submit', function (e) {
            let hasError = false;

            emailError.style.display = 'none';
            passwordError.style.display = 'none';

            const emailValue = email.value.trim();
            const domain = emailValue.split('@')[1];
            const validDomain = 'upnjatim.ac.id';
            const invalidDomains = ['tempmail.com', 'mailinator.com', 'yopmail.com', '10minutemail.com'];

            if (!emailValue.endsWith(`@${validDomain}`) || invalidDomains.includes(domain)) {
                e.preventDefault();
                emailError.textContent = 'Gunakan email resmi';
                emailError.style.display = 'block';
                hasError = true;
            }

            if (password.value !== confirmPassword.value) {
                e.preventDefault();
                passwordError.textContent = 'Password dan konfirmasi tidak cocok.';
                passwordError.style.display = 'block';
                hasError = true;
            }

            if (hasError) return;
        });
    </script>

</body>

</html>
