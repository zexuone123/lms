@extends('layouts.app')

@section('content')
<style>
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

    .lesson-card {
        border-radius: 20px;
        transition: transform 0.3s ease, box-shadow 0.3s ease;
    }
    .lesson-card:hover {
        transform: translateY(-10px);
        box-shadow: 0 8px 20px rgba(0,0,0,0.2);
    }
</style>

<div class="cloud cloud1"></div>
<div class="cloud cloud2"></div>

<div class="container py-5">
    <h2 class="fw-bold text-center text-primary mb-4 animate__animated animate__fadeInDown">
        🌈 Belajar Menyenangkan TK & SD
    </h2>
    <p class="text-center text-muted mb-5">
        Pilih pelajaran favoritmu dan mulai petualangan belajar sekarang!
    </p>

    <div class="row g-4">
        <!-- Matematika -->
        <div class="col-md-4">
            <div class="card shadow-lg lesson-card animate__animated animate__zoomIn">
                <img src="https://placehold.co/400x200?text=📐+Matematika" class="card-img-top" alt="Matematika">
                <div class="card-body text-center">
                    <h4 class="fw-bold text-success">📐 Matematika Dasar</h4>
                    <p class="text-muted">Belajar angka, penjumlahan, dan pengurangan dengan cara seru.</p>
                    <a href="/belajar-anak/matematika" class="btn btn-success btn-fun">Mulai</a>
                </div>
            </div>
        </div>

        <!-- Bahasa Indonesia -->
        <div class="col-md-4">
            <div class="card shadow-lg lesson-card animate__animated animate__zoomIn animate__delay-1s">
                <img src="https://placehold.co/400x200?text=📖+Bahasa+Indonesia" class="card-img-top" alt="Bahasa Indonesia">
                <div class="card-body text-center">
                    <h4 class="fw-bold text-primary">📖 Bahasa Indonesia</h4>
                    <p class="text-muted">Belajar membaca dan menulis dengan cerita menyenangkan.</p>
                    <a href="/belajar-anak/bahasa-indonesia" class="btn btn-primary btn-fun">Mulai</a>
                </div>
            </div>
        </div>

        <!-- Sains -->
        <div class="col-md-4">
            <div class="card shadow-lg lesson-card animate__animated animate__zoomIn animate__delay-2s">
                <img src="https://placehold.co/400x200?text=🔬+Sains" class="card-img-top" alt="Sains">
                <div class="card-body text-center">
                    <h4 class="fw-bold text-warning">🔬 Sains</h4>
                    <p class="text-muted">Kenali dunia alam dan eksperimen sederhana.</p>
                    <a href="/belajar-anak/sains" class="btn btn-warning btn-fun">Mulai</a>
                </div>
            </div>
        </div>

        <!-- Agama & Budi Pekerti -->
        <div class="col-md-4">
            <div class="card shadow-lg lesson-card animate__animated animate__zoomIn">
                <img src="https://placehold.co/400x200?text=🙏+Agama" class="card-img-top" alt="Agama & Budi Pekerti">
                <div class="card-body text-center">
                    <h4 class="fw-bold text-success">🙏 Agama & Budi Pekerti</h4>
                    <p class="text-muted">Belajar kebaikan, sopan santun, dan nilai moral.</p>
                    <a href="/belajar-anak/agama" class="btn btn-success btn-fun">Mulai</a>
                </div>
            </div>
        </div>

        <!-- Literasi -->
        <div class="col-md-4">
            <div class="card shadow-lg lesson-card animate__animated animate__zoomIn animate__delay-1s">
                <img src="https://placehold.co/400x200?text=📚+Literasi" class="card-img-top" alt="Literasi">
                <div class="card-body text-center">
                    <h4 class="fw-bold text-primary">📚 Literasi</h4>
                    <p class="text-muted">Meningkatkan kemampuan membaca dan memahami bacaan.</p>
                    <a href="/belajar-anak/literasi" class="btn btn-primary btn-fun">Mulai</a>
                </div>
            </div>
        </div>

        <!-- Numerasi -->
        <div class="col-md-4">
            <div class="card shadow-lg lesson-card animate__animated animate__zoomIn animate__delay-2s">
                <img src="https://placehold.co/400x200?text=🔢+Numerasi" class="card-img-top" alt="Numerasi">
                <div class="card-body text-center">
                    <h4 class="fw-bold text-warning">🔢 Numerasi</h4>
                    <p class="text-muted">Memahami konsep bilangan dan pola matematika sederhana.</p>
                    <a href="/belajar-anak/numerasi" class="btn btn-warning btn-fun">Mulai</a>
                </div>
            </div>
        </div>

        <!-- Seni -->
        <div class="col-md-4">
            <div class="card shadow-lg lesson-card animate__animated animate__zoomIn">
                <img src="https://placehold.co/400x200?text=🎨+Seni" class="card-img-top" alt="Seni">
                <div class="card-body text-center">
                    <h4 class="fw-bold text-danger">🎨 Seni</h4>
                    <p class="text-muted">Belajar menggambar, mewarnai, dan membuat kerajinan tangan.</p>
                    <a href="/belajar-anak/seni" class="btn btn-danger btn-fun">Mulai</a>
                </div>
            </div>
        </div>

        <!-- Jati Diri -->
        <div class="col-md-4">
            <div class="card shadow-lg lesson-card animate__animated animate__zoomIn animate__delay-1s">
                <img src="https://placehold.co/400x200?text=🧑‍🤝‍🧑+Jati+Diri" class="card-img-top" alt="Jati Diri">
                <div class="card-body text-center">
                    <h4 class="fw-bold text-info">🧑‍🤝‍🧑 Jati Diri</h4>
                    <p class="text-muted">Mengenal potensi diri dan sikap percaya diri.</p>
                    <a href="/belajar-anak/jati-diri" class="btn btn-info btn-fun">Mulai</a>
                </div>
            </div>
        </div>
    </div>

    <div class="text-center mt-5 animate__animated animate__fadeInUp">
        <a href="/" class="btn btn-lg btn-danger btn-fun">
            <i class="bi bi-arrow-left"></i> Kembali ke Halaman Utama
        </a>
    </div>
</div>
@endsection
