@extends('admin.layouts.app')

@section('content')
    <div class="container-fluid">
        <div class="row mb-3">
            <div class="col-md-12">
                <h1 class="h3 mt-4">Edit User</h1>
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb px-0">
                        <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Home</a></li>
                        <li class="breadcrumb-item"><a href="{{ route('users.index') }}">Users</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Edit</li>
                    </ol>
                </nav>
            </div>
        </div>

        <div class="row">
            <div class="col">
                <div class="card card-secondary card-outline mb-4">
                    <div class="card-header">
                        <h5 class="card-title mb-0">Form Edit User</h5>
                    </div>

                    <div class="card-body">
                        <form action="{{ route('users.update', $user->id) }}" method="POST">
                            @csrf
                            @method('PUT')

                            <div class="row">
                                <div class="col-md-6 mb-3">
                                    <label for="name" class="form-label">Nama Lengkap</label>
                                    <input type="text" name="name" id="name" class="form-control"
                                        value="{{ old('name', $user->name) }}" required>
                                    @error('name')
                                        <div class="text-danger mt-1">{{ $message }}</div>
                                    @enderror
                                </div>

                                <div class="col-md-6 mb-3">
                                    <label for="email" class="form-label">Email</label>
                                    <input type="email" name="email" id="email" class="form-control"
                                        value="{{ old('email', $user->email) }}" required>
                                    @error('email')
                                        <div class="text-danger mt-1">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md-6 mb-3">
                                    <label for="password" class="form-label">Password Baru (Opsional)</label>
                                    <input type="password" name="password" id="password" class="form-control"
                                        placeholder="Kosongkan jika tidak ingin mengubah">
                                    @error('password')
                                        <div class="text-danger mt-1">{{ $message }}</div>
                                    @enderror
                                </div>

                                <div class="col-md-6 mb-3">
                                    <label for="password_confirmation" class="form-label">Konfirmasi Password</label>
                                    <input type="password" name="password_confirmation" id="password_confirmation"
                                        class="form-control" placeholder="Kosongkan jika tidak mengubah password">
                                </div>
                            </div>

                            <div class="col-md-6 mb-3">
                                <label for="role" class="form-label">Pilih Role</label>
                                <select name="role" id="role" class="form-select" required>
                                    <option value="">-- Pilih Role --</option>
                                    @foreach ($roles as $role)
                                        @if ($role->name !== 'Super Admin')
                                            <option value="{{ $role->name }}"
                                                {{ old('role', $user->getRoleNames()->first()) == $role->name ? 'selected' : '' }}>
                                                {{ $role->name }}
                                            </option>
                                        @endif
                                    @endforeach
                                </select>
                                @error('role')
                                    <div class="text-danger mt-1">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="d-flex justify-content-end">
                                <a href="{{ route('users.index') }}" class="btn btn-secondary me-2">Batal</a>
                                <button type="submit" class="btn btn-primary">Perbarui</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
