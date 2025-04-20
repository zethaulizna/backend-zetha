<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login - UPN Veteran Jawa Timur</title>
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
        <form action="{{ route('login') }}" method="POST">
            @csrf
            <div class="mb-3">
                <label for="username" class="form-label">Username</label>
                <input type="text" class="form-control" name="username" placeholder="Enter your username" required>
            </div>
            <div class="mb-3">
                <label for="password" class="form-label">Password</label>
                <div class="input-group">
                    <input type="password" class="form-control" name="password" id="password" placeholder="Enter your password" required>
                    <span class="input-group-text" id="togglePassword" style="cursor: pointer; background-color: transparent;">
                    <!-- Mata terbuka -->
                    <svg id="eyeIcon" xmlns="http://www.w3.org/2000/svg" width="18" height="18" fill="none" stroke="#555" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-eye" viewBox="0 0 24 24">
                        <path d="M1 12s4-8 11-8 11 8 11 8-4 8-11 8-11-8-11-8z"></path>
                        <circle cx="12" cy="12" r="3"></circle>
                    </svg>
                    </span>
                </div>
            </div>
            <button type="submit" name="login" class="btn btn-primary w-100">Login</button>
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
</script>

</body>

</html>
