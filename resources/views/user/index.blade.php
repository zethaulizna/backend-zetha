<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Daftar Pengguna</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body>
    <div class="container mt-4">
        <h2 class="mb-3">Daftar Pengguna</h2>

        <!-- Alert -->
        @if(session('success'))
            <div class="alert alert-success">{{ session('success') }}</div>
        @endif

        <!-- Tombol Tambah -->
        <a href="{{ route('user.create') }}" class="btn btn-primary mb-3">Tambah Pengguna</a>

        <!-- Tabel Data -->
        <div class="card">
            <div class="card-body table-responsive">
                @if($users->count())
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th>Username</th>
                            <th>Email</th>
                            <th>Password</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($users as $user)
                        <tr>
                            <td>{{ $user->username }}</td>
                            <td>{{ $user->email }}</td>
                            <td>{{ $user->password }}</td>
                            <td>
                                <a href="{{ route('user.edit', $user->id) }}" class="btn btn-sm btn-warning">Edit</a>
                                <form action="{{ route('user.destroy', $user->id) }}" method="POST" class="d-inline">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-sm btn-danger" onclick="return confirm('Yakin ingin menghapus?')">Hapus</button>
                                </form>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
                @else
                    <p class="text-muted">Belum ada data pengguna.</p>
                @endif
            </div>
        </div>

        <!-- Tombol Kembali -->
        <a href="{{ url('dashboard') }}" class="btn btn-dark mt-3">🔧 Kembali ke Dashboard</a>
    </div>
</body>

</html>
