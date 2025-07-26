@extends('admin.layouts.app')

@section('content')
    <div class="container-fluid">
        <div class="row mb-3">
            <div class="col-md-12">
                <h1 class="h3 mt-4">Edit Permission</h1>
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb px-0">
                        <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Home</a></li>
                        <li class="breadcrumb-item"><a href="{{ route('permissions.index') }}">Permissions</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Edit</li>
                    </ol>
                </nav>
            </div>
        </div>

        <div class="row">
            <div class="col">
                <div class="card card-secondary card-outline mb-4">
                    <div class="card-header">
                        <h5 class="card-title mb-0">Form Edit Permission</h5>
                    </div>
                    <div class="card-body">
                        <form action="{{ route('permissions.update', $permission->id) }}" method="POST">
                            @csrf
                            @method('PUT')
                            <div class="mb-3">
                                <label for="name" class="form-label">Nama Permission</label>
                                <input type="text" name="name" id="name" class="form-control"
                                    value="{{ old('name', $permission->name) }}" required>
                                @error('name')
                                    <div class="text-danger mt-1">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="d-flex justify-content-end">
                                <a href="{{ route('permissions.index') }}" class="btn btn-secondary me-2">Batal</a>
                                <button type="submit" class="btn btn-primary">Update</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>

    </div>
@endsection
