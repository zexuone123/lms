@extends('layouts.app')

@section('content')
    <div class="app-content">
        <div class="container-fluid">
            <div class="row mb-3">
                <div class="col-md-12">
                    <h1 class="h3 mt-4">Role Terhapus</h1>
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb px-0">
                            <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Home</a></li>
                            <li class="breadcrumb-item"><a href="{{ route('roles.index') }}">Roles</a></li>
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
                                        <th>Nama Role</th>
                                        <th style="width: 200px;">Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @forelse ($roles as $index => $role)
                                        <tr>
                                            <td>{{ $roles->firstItem() + $index }}</td>
                                            <td>{{ $role->name }}</td>
                                            <td>
                                                <div class="d-flex gap-2">
                                                    <button type="button" class="btn btn-sm btn-success btn-restore"
                                                        data-id="{{ $role->id }}"
                                                        data-url="{{ route('roles.restore', $role->id) }}">
                                                        <i class="bi bi-arrow-counterclockwise"></i> Restore
                                                    </button>

                                                    <button type="button" class="btn btn-sm btn-danger btn-force-delete"
                                                        data-id="{{ $role->id }}"
                                                        data-url="{{ route('roles.forceDelete', $role->id) }}">
                                                        <i class="bi bi-x-circle"></i> Hapus Permanen
                                                    </button>
                                                </div>

                                            </td>
                                        </tr>
                                    @empty
                                        <tr>
                                            <td colspan="3" class="text-center">Tidak ada role di trash.</td>
                                        </tr>
                                    @endforelse
                                </tbody>
                            </table>
                            <div class="d-flex justify-content-end mt-3">
                                {{ $roles->links() }}
                            </div>
                            <a href="{{ route('roles.index') }}" class="btn btn-primary mt-3">
                                <i class="bi bi-arrow-left"></i> Kembali ke Daftar Role
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
