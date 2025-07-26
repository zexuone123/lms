@extends('admin.layouts.app')

@section('content')
    <div class="container mt-4">
        <h3 class="mb-4">📚 Data Siswa</h3>
        <div class="d-flex justify-content-between align-items-center mb-3">
            <form action="{{ route('siswa.index') }}" method="GET" class="mb-3">
                <div class="input-group">
                    <input type="text" name="search" class="form-control" placeholder="Cari nama atau username..."
                        value="{{ request('search') }}">
                    <button class="btn btn-primary" type="submit">Cari</button>
                </div>
            </form>
            @can('siswa create')
                <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#createModal">
                    + Tambah Siswa
                </button>
            @endcan
        </div>

        <div class="table-responsive">
            <table class="table table-striped table-hover align-middle">
                <thead class="table-primary">
                    <tr>
                        <th>Nama</th>
                        <th>Username</th>
                        <th>Kelas</th>
                        <th>Email</th>
                        <th class="text-center">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($siswas as $siswa)
                        <tr>
                            <td>{{ $siswa->name }}</td>
                            <td>{{ $siswa->username }}</td>
                            <td>{{ $siswa->class }}</td>
                            <td>{{ $siswa->email ?? '-' }}</td>
                            <td class="text-center">
                                <div class="d-flex justify-content-center gap-2">
                                    @can('siswa edit')
                                        <button class="btn btn-sm btn-warning" data-bs-toggle="modal"
                                            data-bs-target="#editModal{{ $siswa->id }}">
                                            <i class="bi bi-pencil-square"></i>
                                        </button>
                                    @endcan
                                    @can('siswa delete')
                                        <form id="delete-form-{{ $siswa->id }}"
                                            action="{{ route('siswa.destroy', $siswa->id) }}" method="POST"
                                            style="display: inline;">
                                            @csrf
                                            @method('DELETE')
                                            <button type="button" class="btn btn-sm btn-danger"
                                                onclick="confirmDelete({{ $siswa->id }})">
                                                <i class="bi bi-trash"></i>
                                            </button>
                                        </form>
                                    @endcan
                                </div>
                            </td>
                        </tr>

                        {{-- Modal Edit --}}
                        <div class="modal fade" id="editModal{{ $siswa->id }}" tabindex="-1">
                            <div class="modal-dialog modal-lg">
                                <form method="POST" action="{{ route('siswa.update', $siswa->id) }}">
                                    @csrf @method('PUT')
                                    <div class="modal-content">
                                        <div class="modal-header bg-warning text-white">
                                            <h5 class="modal-title">Edit Siswa</h5>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                                        </div>
                                        <div class="modal-body">
                                            <div class="row g-3">
                                                <div class="col-md-6">
                                                    <label>Nama</label>
                                                    <input name="name" class="form-control" value="{{ $siswa->name }}"
                                                        required>
                                                </div>
                                                <div class="col-md-6">
                                                    <label>Kelas</label>
                                                    <input name="class" class="form-control" value="{{ $siswa->class }}"
                                                        required>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="modal-footer">
                                            <button class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                                            <button class="btn btn-primary">Simpan Perubahan</button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>

    {{-- Modal Tambah --}}
    <div class="modal fade" id="createModal" tabindex="-1">
        <div class="modal-dialog modal-lg">
            <form method="POST" action="{{ route('siswa.store') }}" autocomplete="off">
                @csrf
                <div class="modal-content">
                    <div class="modal-header bg-primary text-white">
                        <h5 class="modal-title">Tambah Siswa</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                    </div>

                    <div class="modal-body">
                        <div class="row g-3">
                            <div class="col-md-6">
                                <label>Nama</label>
                                <input name="name" id="name" class="form-control" placeholder="Nama Lengkap"
                                    required autocomplete="off">
                            </div>
                            <div class="col-md-6">
                                <label>Kelas</label>
                                <input name="class" id="class" class="form-control" placeholder="Contoh: X PPLG 1"
                                    required autocomplete="off">
                            </div>
                            <div class="col-md-6">
                                <label>Username</label>
                                <input name="username" id="username" class="form-control" placeholder="Username" required
                                    autocomplete="off" readonly>
                            </div>
                            <div class="col-md-6">
                                <label>
                                    Password <small class="text-muted">(Kosongkan jika tidak ingin mengubah)</small>
                                </label>
                                <div class="input-group">
                                    <input id="passwordInput" name="password" id="password" type="password"
                                        class="form-control" placeholder="Opsional" autocomplete="new-password" readonly>
                                    <button type="button" class="btn btn-outline-secondary" onclick="togglePassword()">
                                        👁
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="modal-footer">
                        <button class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                        <button class="btn btn-success">Tambah</button>
                    </div>
                </div>
            </form>
        </div>
    </div>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const nameInput = document.querySelector('input[name="name"]');
            const usernameInput = document.querySelector('input[name="username"]');
            const passwordInput = document.querySelector('input[name="password"]');

            nameInput.addEventListener('input', function() {
                const nameValue = nameInput.value.trim();

                if (nameValue.length > 0) {
                    const baseUsername = nameValue.toLowerCase().replace(/\s+/g, '').replace(/[^a-z0-9]/g,
                        '');

                    const randomNumber = Math.floor(100 + Math.random() * 900);

                    const finalUsername = baseUsername + randomNumber;

                    usernameInput.value = finalUsername;
                    passwordInput.value = finalUsername;
                } else {
                    usernameInput.value = '';
                    passwordInput.value = '';
                }
            });
        });
    </script>
    <script>
        function togglePassword() {
            const input = document.getElementById("passwordInput");
            input.type = input.type === "password" ? "text" : "password";
        }
    </script>
@endsection
