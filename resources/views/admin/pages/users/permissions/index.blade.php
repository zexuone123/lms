@extends('admin.layouts.app')

@section('content')
    <div class="app-content">
        <div class="container-fluid">
            <div class="row mb-3">
                <div class="col-md-12">
                    <h1 class="h3 mt-4">Manajemen Permission</h1>
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb px-0">
                            <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Home</a></li>
                            <li class="breadcrumb-item active" aria-current="page">Permissions</li>
                        </ol>
                    </nav>
                </div>
            </div>
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <div class="row align-items-center justify-content-between w-100">
                                <div class="col-md-5">
                                    <form action="{{ route('permissions.index') }}" method="GET" class="d-flex">
                                        <input type="text" name="search" class="form-control me-2"
                                            placeholder="Cari Permission..." value="{{ request('search') }}">
                                        <button class="btn btn-primary" type="submit">Cari</button>
                                    </form>
                                </div>

                                <div class="col text-md-end">
                                    <a href="{{ route('permissions.trash.list') }}" class="btn btn-secondary me-2">
                                        <i class="bi bi-trash"></i> View Trash
                                    </a>
                                    <a href="{{ route('permissions.create') }}" class="btn btn-success">
                                        + Tambah Permission
                                    </a>
                                </div>
                            </div>
                        </div>
                        <div class="card-body">
                            <table class="table table-bordered table-striped">
                                <thead class="table-light">
                                    <tr>
                                        <th style="width: 50px;">No</th>
                                        <th>Nama Permission</th>
                                        <th style="width: 200px;">Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @forelse ($permissions as $index => $permission)
                                        <tr>
                                            <td>{{ $permissions->firstItem() + $index }}</td>
                                            <td>{{ $permission->name }}</td>
                                            <td>
                                                <div class="d-flex gap-2">
                                                    <a href="{{ route('permissions.edit', $permission->id) }}"
                                                        class="btn btn-sm btn-warning" title="Edit">
                                                        <i class="bi bi-pencil-square"></i>
                                                    </a>

                                                    <div class="dropdown">
                                                        <button class="btn btn-sm btn-danger dropdown-toggle" type="button"
                                                            data-bs-toggle="dropdown" aria-expanded="false">
                                                            <i class="bi bi-trash3"></i>
                                                        </button>
                                                        <ul class="dropdown-menu">
                                                            <li>
                                                                <button type="button"
                                                                    class="dropdown-item text-warning btn-soft-delete"
                                                                    data-id="{{ $permission->id }}"
                                                                    data-url="{{ route('permissions.trash', $permission->id) }}">
                                                                    <i class="bi bi-archive"></i> Trash (Soft Delete)
                                                                </button>
                                                            </li>
                                                            <li>
                                                                <button type="button"
                                                                    class="dropdown-item text-danger btn-force-delete"
                                                                    data-id="{{ $permission->id }}"
                                                                    data-url="{{ route('permissions.forceDelete', $permission->id) }}">
                                                                    <i class="bi bi-x-circle"></i> Hapus Permanen
                                                                </button>
                                                            </li>
                                                        </ul>
                                                    </div>
                                                </div>
                                            </td>
                                        </tr>
                                    @empty
                                        <tr>
                                            <td colspan="3" class="text-center">Tidak ada data permission ditemukan.</td>
                                        </tr>
                                    @endforelse
                                </tbody>
                            </table>
                            <div class="d-flex justify-content-between align-items-center mt-3">
                                <div>
                                    Showing {{ $permissions->firstItem() }} to {{ $permissions->lastItem() }} of
                                    {{ $permissions->total() }} results
                                </div>
                                {{ $permissions->links('pagination::bootstrap-5') }}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    </div>
@endsection
