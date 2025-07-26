@extends('layouts.app')

@section('content')
    <div class="app-content">
        <div class="container-fluid">
            <div class="row mb-3">
                <div class="col-md-12">
                    <h1 class="h3 mt-4">Manajemen User</h1>
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb px-0">
                            <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Home</a></li>
                            <li class="breadcrumb-item active" aria-current="page">Users</li>
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
                                    <form action="{{ route('users.index') }}" method="GET" class="d-flex">
                                        <input type="text" name="search" class="form-control me-2"
                                            placeholder="Cari User..." value="{{ request('search') }}">
                                        <button class="btn btn-primary" type="submit">Cari</button>
                                    </form>
                                </div>

                                <div class="col text-md-end">
                                    <a href="{{ route('users.trash.list') }}" class="btn btn-secondary me-2">
                                        <i class="bi bi-trash"></i> View Trash
                                    </a>
                                    <a href="{{ route('users.create') }}" class="btn btn-success">
                                        + Tambah User
                                    </a>
                                </div>
                            </div>
                        </div>

                        <div class="card-body">
                            <table class="table table-bordered table-striped">
                                <thead class="table-light">
                                    <tr>
                                        <th style="width: 50px;">No</th>
                                        <th>Nama</th>
                                        <th>Email</th>
                                        <th>Role</th>
                                        <th style="width: 200px;">Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @forelse ($users as $index => $user)
                                        <tr>
                                            <td>{{ $users->firstItem() + $index }}</td>
                                            <td>{{ $user->name }}</td>
                                            <td>{{ $user->email }}</td>
                                            <td>{{ $user->getRoleNames()->join(', ') }}</td>
                                            <td>
                                                <div class="d-flex gap-2">
                                                    @if ($user->hasRole('super_admin'))
                                                        <button class="btn btn-sm btn-danger" disabled>Super Admin</button>
                                                    @else
                                                        {{-- Tombol Impersonate --}}
                                                        <form action="{{ route('impersonate', $user->id) }}" method="GET"
                                                            style="display: inline;">
                                                            @csrf
                                                            <button type="submit" class="btn btn-sm btn-info"
                                                                title="Login sebagai user ini">
                                                                <i class="bi bi-person-check"></i> Use As
                                                            </button>
                                                        </form>

                                                        {{-- Tombol Edit --}}
                                                        <a href="{{ route('users.edit', $user->id) }}"
                                                            class="btn btn-sm btn-warning" title="Edit">
                                                            <i class="bi bi-pencil-square"></i>
                                                        </a>

                                                        {{-- Dropdown Delete --}}
                                                        <div class="dropdown">
                                                            <button class="btn btn-sm btn-danger dropdown-toggle"
                                                                type="button" data-bs-toggle="dropdown"
                                                                aria-expanded="false">
                                                                <i class="bi bi-trash3"></i>
                                                            </button>
                                                            <ul class="dropdown-menu">
                                                                <li>
                                                                    <button type="button"
                                                                        class="dropdown-item text-warning btn-soft-delete"
                                                                        data-id="{{ $user->id }}"
                                                                        data-url="{{ route('users.trash', $user->id) }}">
                                                                        <i class="bi bi-archive"></i> Trash (Soft Delete)
                                                                    </button>
                                                                </li>
                                                                <li>
                                                                    <button type="button"
                                                                        class="dropdown-item text-danger btn-force-delete"
                                                                        data-id="{{ $user->id }}"
                                                                        data-url="{{ route('users.forceDelete', $user->id) }}">
                                                                        <i class="bi bi-x-circle"></i> Hapus Permanen
                                                                    </button>
                                                                </li>
                                                            </ul>
                                                        </div>
                                                    @endif
                                                </div>
                                            </td>
                                        </tr>
                                    @empty
                                        <tr>
                                            <td colspan="5" class="text-center">Tidak ada data user ditemukan.</td>
                                        </tr>
                                    @endforelse
                                </tbody>
                            </table>
                            <div class="d-flex justify-content-end mt-3">
                                {{ $users->withQueryString()->links() }}
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
