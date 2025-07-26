@extends('layouts.app')

@section('content')
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css">

<div class="container py-5 d-flex justify-content-center">
    <div class="card shadow-lg p-4" style="width: 100%; max-width: 400px;" data-aos="zoom-in">
        <div class="text-center mb-4">
            <img src="https://placehold.co/120x120?text=LOGO" class="rounded-circle mb-3 animate__animated animate__bounceIn" alt="Logo">
            <h3 class="fw-bold text-primary">Selamat Datang!</h3>
            <p class="text-muted">Masuk untuk mulai belajar</p>
        </div>
        <form method="POST" action="{{ route('login') }}">
            @csrf
            <div class="mb-3">
                <label for="email" class="form-label fw-bold">Email</label>
                <input type="email" class="form-control rounded-pill" id="email" name="email" required autofocus>
            </div>
            <div class="mb-4">
                <label for="password" class="form-label fw-bold">Password</label>
                <input type="password" class="form-control rounded-pill" id="password" name="password" required>
            </div>
            <button type="submit" class="btn btn-warning w-100 btn-fun">
                <i class="bi bi-door-open-fill me-1"></i> Login
            </button>
        </form>
    </div>
</div>
@endsection
