@extends('layouts.app')

@section('content')
    <div class="app-content">
        <div class="container-fluid">
            <div class="row mb-3">
                <div class="col-md-12">
                    <h1 class="h3 mt-4">Permission Terhapus</h1>
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb px-0">
                            <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Home</a></li>
                            <li class="breadcrumb-item"><a href="{{ route('permissions.index') }}">Permissions</a></li>
                            <li class="breadcrumb-item active" aria-current="page">Trash</li>
                        </ol>
                    </nav>
                </div>
            </div>
            <div class="row">
                <div class="col-12">
                    <div class="card">
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
                                                    <button type="button" class="btn btn-sm btn-success btn-restore"
                                                        data-id="{{ $permission->id }}"
                                                        data-url="{{ route('permissions.restore', $permission->id) }}">
                                                        <i class="bi bi-arrow-counterclockwise"></i> Restore
                                                    </button>

                                                    <button type="button" class="btn btn-sm btn-danger btn-force-delete"
                                                        data-id="{{ $permission->id }}"
                                                        data-url="{{ route('permissions.forceDelete', $permission->id) }}">
                                                        <i class="bi bi-x-circle"></i> Hapus Permanen
                                                    </button>
                                                </div>
                                            </td>
                                        </tr>
                                    @empty
                                        <tr>
                                            <td colspan="3" class="text-center">Tidak ada permission di trash.</td>
                                        </tr>
                                    @endforelse
                                </tbody>
                            </table>
                            <div class="d-flex justify-content-end mt-3">
                                {{ $permissions->links() }}
                            </div>
                            <a href="{{ route('permissions.index') }}" class="btn btn-primary mt-3">
                                <i class="bi bi-arrow-left"></i> Kembali ke Daftar Permission
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
