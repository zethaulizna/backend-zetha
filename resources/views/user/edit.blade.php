<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit User</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body>
    <div class="container mt-4">
        <h2>Edit User</h2>

        @if (session('success'))
            <div class="alert alert-success">{{ session('success') }}</div>
        @endif

        @if ($errors->any())
            <div class="alert alert-danger">
                <ul class="mb-0">
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form action="{{ route('user.update', $user->id) }}" method="POST">
            @csrf
            @method('PUT')

            <div class="mb-3">
                <label for="username" class="form-label">Username</label>
                <input type="text" name="username" id="username" class="form-control" value="{{ old('username', $user->username) }}" required>
            </div>

            <div class="mb-3">
                <label for="email" class="form-label">Email</label>
                <input type="email" name="email" id="email" class="form-control" value="{{ old('email', $user->email) }}" required>
            </div>

            <div class="mb-3">
    <label for="password" class="form-label">Password (opsional)</label>
    <div class="input-group">
        <input type="password" name="password" id="password" class="form-control"
            placeholder="Biarkan kosong jika tidak ingin mengubah">
        <span class="input-group-text password-toggle" onclick="togglePassword('password', this)">
            <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor"
                class="bi bi-eye" viewBox="0 0 16 16">
                <path d="M16 8s-3-5.5-8-5.5S0 8 0 8s3 5.5 8 5.5S16 8 16 8z" />
                <path d="M8 5a3 3 0 1 1 0 6A3 3 0 0 1 8 5z" />
            </svg>
        </span>
    </div>
</div>

<div class="mb-3">
    <label for="password_confirmation" class="form-label">Konfirmasi Password</label>
    <div class="input-group">
        <input type="password" name="password_confirmation" id="password_confirmation" class="form-control"
            placeholder="Biarkan kosong jika tidak ingin mengubah">
        <span class="input-group-text password-toggle" onclick="togglePassword('password_confirmation', this)">
            <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor"
                class="bi bi-eye" viewBox="0 0 16 16">
                <path d="M16 8s-3-5.5-8-5.5S0 8 0 8s3 5.5 8 5.5S16 8 16 8z" />
                <path d="M8 5a3 3 0 1 1 0 6A3 3 0 0 1 8 5z" />
            </svg>
        </span>
    </div>
</div>


            <button type="submit" class="btn btn-primary">Update</button>
            <a href="{{ route('dashboard.user') }}" class="btn btn-secondary">Batal</a>
        </form>
    </div>

    <script>
    function togglePassword(inputId, toggleIcon) {
        const input = document.getElementById(inputId);
        const svg = toggleIcon.querySelector('svg');

        if (input.type === "password") {
            input.type = "text";
            svg.classList.remove("bi-eye");
            svg.classList.add("bi-eye-slash");
            svg.innerHTML = `
                <path d="M13.359 11.238a7.13 7.13 0 0 0 2.15-3.238s-3-5.5-8-5.5a7.03 7.03 0 0 0-3.27.801l1.453 1.453a5.99 5.99 0 0 1 1.817-.254c2.89 0 5.223 2.095 6.418 3.75a7.15 7.15 0 0 1-1.044 1.286l1.476 1.476z"/>
                <path d="M2.146 2.146a.5.5 0 0 1 .708 0L14 13.293a.5.5 0 0 1-.707.707l-1.518-1.518a8.682 8.682 0 0 1-3.775 1.017c-5 0-8-5.5-8-5.5a14.43 14.43 0 0 1 3.095-3.872L2.146 2.854a.5.5 0 1 1 .708-.708z"/>
            `;
        } else {
            input.type = "password";
            svg.classList.remove("bi-eye-slash");
            svg.classList.add("bi-eye");
            svg.innerHTML = `
                <path d="M16 8s-3-5.5-8-5.5S0 8 0 8s3 5.5 8 5.5S16 8 16 8z"/>
                <path d="M8 5a3 3 0 1 1 0 6A3 3 0 0 1 8 5z"/>
            `;
        }
    }
</script>
</body>

</html>
