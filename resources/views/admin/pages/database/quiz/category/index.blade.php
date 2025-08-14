@extends('admin.layouts.app')

@section('content')
    <div class="app-content">
        <div class="container-fluid">
            <!-- Judul & Breadcrumb -->
            <div class="row mb-3">
                <div class="col-md-12">
                    <h1 class="h3 mt-4">Kategori Quiz</h1>
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb px-0">
                            <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Home</a></li>
                            <li class="breadcrumb-item active" aria-current="page">Kategori Quiz</li>
                        </ol>
                    </nav>
                </div>
            </div>

            <!-- Card Data -->
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <div class="row align-items-center justify-content-between w-100">
                                <div class="col-md-5 mb-2">
                                    <form action="{{ route('category-quiz.index') }}" method="GET" class="d-flex">
                                        <input type="text" name="search" class="form-control me-2"
                                            placeholder="Cari kategori..." value="{{ request('search') }}">
                                        <button class="btn btn-primary" type="submit">
                                            <i class="bi bi-search"></i>
                                        </button>
                                    </form>
                                </div>
                                <div class="col text-md-end mb-2">
                                    @can('category-quiz create')
                                        <button class="btn btn-success" data-bs-toggle="modal" data-bs-target="#createModal">
                                            <i class="bi bi-plus-circle"></i> Tambah Kategori
                                        </button>
                                    @endcan
                                </div>
                            </div>
                        </div>

                        <div class="card-body">
                            <table class="table table-bordered table-striped align-middle">
                                <thead class="table-light">
                                    <tr>
                                        <th>Nama Kategori</th>
                                        <th>Deskripsi</th>
                                        <th class="text-center" style="width: 180px;">Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @forelse ($categories as $category)
                                        <tr>
                                            <td>{{ $category->name }}</td>
                                            <td>{{ \Illuminate\Support\Str::limit($category->description, 50, '...') }}</td>
                                            <td class="text-center">
                                                <div class="d-flex justify-content-center gap-2">
                                                    @can('category-quiz edit')
                                                        <button class="btn btn-sm btn-warning" data-bs-toggle="modal"
                                                            data-bs-target="#editModal{{ $category->id }}">
                                                            <i class="bi bi-pencil-square"></i> Edit
                                                        </button>
                                                    @endcan

                                                    @can('category-quiz delete')
                                                        <form id="delete-form-{{ $category->id }}"
                                                            action="{{ route('category-quiz.destroy', $category->id) }}"
                                                            method="POST" style="display: none;">
                                                            @csrf
                                                            @method('DELETE')
                                                        </form>

                                                        <button type="button" class="btn btn-sm btn-danger"
                                                            onclick="confirmDelete({{ $category->id }})">
                                                            <i class="bi bi-trash"></i> Hapus
                                                        </button>
                                                    @endcan
                                                </div>
                                            </td>
                                        </tr>

                                        <!-- Modal Edit -->
                                        <div class="modal fade" id="editModal{{ $category->id }}" tabindex="-1">
                                            <div class="modal-dialog">
                                                <form method="POST"
                                                    action="{{ route('category-quiz.update', $category->id) }}">
                                                    @csrf @method('PUT')
                                                    <div class="modal-content">
                                                        <div class="modal-header bg-warning text-white">
                                                            <h5 class="modal-title">Edit Kategori</h5>
                                                            <button type="button" class="btn-close"
                                                                data-bs-dismiss="modal"></button>
                                                        </div>
                                                        <div class="modal-body">
                                                            <div class="mb-3">
                                                                <label>Nama Kategori</label>
                                                                <input name="name" class="form-control"
                                                                    value="{{ $category->name }}" required>
                                                            </div>
                                                            <div class="mb-3">
                                                                <label>Deskripsi</label>
                                                                <textarea name="description" class="form-control" rows="2">{{ $category->description }}</textarea>
                                                            </div>
                                                        </div>
                                                        <div class="modal-footer">
                                                            <button class="btn btn-secondary"
                                                                data-bs-dismiss="modal">Batal</button>
                                                            <button class="btn btn-primary">Simpan</button>
                                                        </div>
                                                    </div>
                                                </form>
                                            </div>
                                        </div>
                                    @empty
                                        <tr>
                                            <td colspan="3" class="text-center text-muted">Tidak ada kategori ditemukan.
                                            </td>
                                        </tr>
                                    @endforelse
                                </tbody>
                            </table>

                            <!-- Pagination -->
                            <div class="d-flex justify-content-end mt-3">
                                {{ $categories->withQueryString()->links() }}
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Modal Tambah -->
            <div class="modal fade" id="createModal" tabindex="-1">
                <div class="modal-dialog">
                    <form method="POST" action="{{ route('category-quiz.store') }}">
                        @csrf
                        <div class="modal-content">
                            <div class="modal-header bg-primary text-white">
                                <h5 class="modal-title">Tambah Kategori</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                            </div>
                            <div class="modal-body">
                                <div class="mb-3">
                                    <label>Nama Kategori</label>
                                    <input name="name" class="form-control" placeholder="Contoh: Matematika" required>
                                </div>
                                <div class="mb-3">
                                    <label>Deskripsi</label>
                                    <textarea name="description" class="form-control" rows="2" placeholder="Deskripsi singkat kategori..."></textarea>
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

        </div>
    </div>
@endsection
