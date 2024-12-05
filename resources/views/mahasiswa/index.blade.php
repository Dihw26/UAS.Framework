<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Daftar Mahasiswa</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body>
    <div class="container mt-5">
        <h1>Daftar Mahasiswa</h1>

        <!-- Tampilkan pesan sukses jika ada -->
        @if (session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
        @endif

        <!-- Form untuk input data mahasiswa -->
        <form action="{{ route('mahasiswa.store') }}" method="POST">
            @csrf
            <div class="mb-3">
                <label for="npm" class="form-label">NPM</label>
                <input type="text" class="form-control" id="npm" name="npm" required>
            </div>
            <div class="mb-3">
                <label for="nama" class="form-label">Nama</label>
                <input type="text" class="form-control" id="nama" name="nama" required>
            </div>
            <div class="mb-3">
                <label for="prodi" class="form-label">Prodi</label>
                <input type="text" class="form-control" id="prodi" name="prodi" required>
            </div>
            <button type="submit" class="btn btn-primary">Simpan</button>
        </form>

        <!-- Tabel daftar mahasiswa -->
        <h2 class="mt-5">Data Mahasiswa</h2>
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>NPM</th>
                    <th>Nama</th>
                    <th>Prodi</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($mahasiswas as $mahasiswa)
                <tr>
                    <td>{{ $mahasiswa->npm }}</td>
                    <td>{{ $mahasiswa->nama }}</td>
                    <td>{{ $mahasiswa->prodi }}</td>
                    <td>
                        <!-- Form untuk hapus -->
                        <form action="{{ route('mahasiswa.destroy', $mahasiswa->id) }}" method="POST" onsubmit="return confirm('Apakah Anda yakin ingin menghapus data ini?')">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger">Hapus</button>
                        </form>
                    </td>
                </tr>
                @empty
                <tr>
                    <td colspan="3" class="text-center">Belum ada data</td>
                </tr>
                @endforelse
            </tbody>
        </table>
        <div class="d-flex justify-content-between mb-3">
            <h2>Data Mahasiswa</h2>
            <a href="{{ route('mahasiswa.export') }}" class="btn btn-success">Export ke Excel</a>
        </div>
    </div>
</body>

</html>