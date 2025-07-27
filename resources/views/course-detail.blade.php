@extends('layouts.app')

@section('content')
<style>
    /* Background awan */
    body {
        background: linear-gradient(180deg, #a0e9ff, #fef9c3);
        overflow-x: hidden;
        position: relative;
    }
    .cloud {
        position: absolute;
        background: #fff;
        border-radius: 50%;
        opacity: 0.8;
        animation: moveClouds 60s linear infinite;
    }
    .cloud1 { width: 150px; height: 80px; top: 50px; left: -200px; }
    .cloud2 { width: 200px; height: 100px; top: 150px; left: -300px; animation-duration: 80s; }
    @keyframes moveClouds {
        0% { transform: translateX(0); }
        100% { transform: translateX(120vw); }
    }
</style>

<!-- Awan -->
<div class="cloud cloud1"></div>
<div class="cloud cloud2"></div>

<div class="container py-5">
    <h2 class="fw-bold text-center text-primary mb-4 animate__animated animate__fadeInDown">
        🌟 Belajar Menyenangkan untuk TK & SD 🌈
    </h2>
    <p class="text-center text-muted mb-5">
        Pilih mata pelajaran favoritmu dan mulai petualangan belajar sekarang!
    </p>

    <div class="row g-4">
        <!-- Matematika -->
        <div class="col-md-4">
            <div class="card shadow-lg border-0 animate__animated animate__zoomIn" style="border-radius: 20px;">
                <img src="https://placehold.co/400x200?text=📐+Matematika" class="card-img-top" alt="Matematika" style="border-top-left-radius:20px;border-top-right-radius:20px;">
                <div class="card-body text-center">
                    <h4 class="fw-bold text-success">📐 Matematika Dasar</h4>
                    <p class="text-muted">Belajar angka, penjumlahan, dan pengurangan dengan cara seru.</p>
                    <a href="/belajar/matematika" class="btn btn-success btn-fun">Mulai</a>
                </div>
            </div>
        </div>

        <!-- Bahasa Indonesia -->
        <div class="col-md-4">
            <div class="card shadow-lg border-0 animate__animated animate__zoomIn animate__delay-1s" style="border-radius: 20px;">
                <img src="https://placehold.co/400x200?text=📖+Bahasa+Indonesia" class="card-img-top" alt="Bahasa Indonesia" style="border-top-left-radius:20px;border-top-right-radius:20px;">
                <div class="card-body text-center">
                    <h4 class="fw-bold text-primary">📖 Bahasa Indonesia</h4>
                    <p class="text-muted">Belajar membaca dan menulis dengan cerita menyenangkan.</p>
                    <a href="/belajar/bahasa-indonesia" class="btn btn-primary btn-fun">Mulai</a>
                </div>
            </div>
        </div>

        <!-- Sains -->
        <div class="col-md-4">
            <div class="card shadow-lg border-0 animate__animated animate__zoomIn animate__delay-2s" style="border-radius: 20px;">
                <img src="https://placehold.co/400x200?text=🔬+Sains" class="card-img-top" alt="Sains" style="border-top-left-radius:20px;border-top-right-radius:20px;">
                <div class="card-body text-center">
                    <h4 class="fw-bold text-warning">🔬 Sains</h4>
                    <p class="text-muted">Kenali dunia alam dan eksperimen sederhana.</p>
                    <a href="/belajar/sains" class="btn btn-warning btn-fun">Mulai</a>
                </div>
            </div>
        </div>
    </div>

    <div class="text-center mt-5 animate__animated animate__fadeInUp">
        <a href="/dashboard" class="btn btn-lg btn-danger btn-fun">
            <i class="bi bi-house-door"></i> Kembali ke Dashboard
        </a>
    </div>
</div>
@endsection
