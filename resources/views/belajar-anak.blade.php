@extends('layouts.app')

@section('content')
<style>
    body {
        background: linear-gradient(180deg, #a0e9ff, #fef9c3);
        overflow-x: hidden;
        position: relative;
    }

    /* Awan animasi */
    .cloud {
        position: absolute;
        background: #fff;
        border-radius: 50%;
        opacity: 0.8;
        animation: moveClouds linear infinite;
    }
    .cloud1 { width: 150px; height: 80px; top: 50px; left: -200px; animation-duration: 60s; }
    .cloud2 { width: 200px; height: 100px; top: 150px; left: -300px; animation-duration: 80s; }

    @keyframes moveClouds {
        0% { transform: translateX(0); }
        100% { transform: translateX(120vw); }
    }

    /* Card Pelajaran */
    .lesson-card {
        border-radius: 20px;
        transition: transform 0.3s ease, box-shadow 0.3s ease;
    }
    .lesson-card:hover {
        transform: translateY(-8px);
        box-shadow: 0 8px 20px rgba(0,0,0,0.2);
    }
    .lesson-img {
        border-top-left-radius: 20px;
        border-top-right-radius: 20px;
    }
</style>

<!-- Awan -->
<div class="cloud cloud1"></div>
<div class="cloud cloud2"></div>

<div class="container py-5">
    <!-- Judul -->
    <h2 class="fw-bold text-center text-primary mb-3 animate__animated animate__fadeInDown">
        🌈 Belajar Menyenangkan TK & SD
    </h2>
    <p class="text-center text-muted mb-5">
        Pilih pelajaran favoritmu dan mulai petualangan belajar sekarang!
    </p>

    <!-- Daftar Pelajaran -->
    <div class="row g-4">

        <!-- Matematika -->
        <div class="col-md-4">
            <div class="card shadow-lg lesson-card animate__animated animate__zoomIn">
                <img src="https://placehold.co/400x200?text=📐+Matematika" class="card-img-top" alt="Matematika">
                <div class="card-body text-center">
                    <h4 class="fw-bold text-success">📐 Matematika Dasar</h4>
                    <p class="text-muted">Belajar angka, penjumlahan, dan pengurangan dengan cara seru.</p>
                    <a href="{{ route('belajar-anak.matematika') }}" class="btn btn-success btn-fun">Mulai</a>
                </div>
            </div>
        </div>

        @php
            $lessons = [
                ['title' => '📐 Matematika Dasar', 'desc' => 'Belajar angka, penjumlahan, dan pengurangan dengan cara seru.', 'color' => 'success', 'img' => '📐+Matematika', 'link' => 'matematika'],
                ['title' => '📖 Bahasa Indonesia', 'desc' => 'Belajar membaca dan menulis dengan cerita menyenangkan.', 'color' => 'primary', 'img' => '📖+Bahasa+Indonesia', 'link' => 'bahasa-indonesia'],
                ['title' => '🔬 Sains', 'desc' => 'Kenali dunia alam dan eksperimen sederhana.', 'color' => 'warning', 'img' => '🔬+Sains', 'link' => 'sains'],
                ['title' => '🙏 Agama & jati diri', 'desc' => 'Belajar kebaikan, sopan santun, nilai moral, dan mengenal potensi diri.', 'color' => 'success', 'img' => '🙏+Agama', 'link' => 'agama'],
                ['title' => '📚 Literasi', 'desc' => 'Meningkatkan kemampuan membaca dan memahami bacaan.', 'color' => 'primary', 'img' => '📚+Literasi', 'link' => 'literasi'],
                ['title' => '🔢 Numerasi', 'desc' => 'Memahami konsep bilangan dan pola matematika sederhana.', 'color' => 'warning', 'img' => '🔢+Numerasi', 'link' => 'numerasi'],
                ['title' => '🎨 Seni', 'desc' => 'Belajar menggambar, mewarnai, dan membuat kerajinan tangan.', 'color' => 'danger', 'img' => '🎨+Seni', 'link' => 'seni'],
            ];
        @endphp

        @foreach($lessons as $index => $lesson)
        <div class="col-md-4">
            <div class="card shadow-lg lesson-card animate__animated animate__zoomIn {{ $index % 3 == 1 ? 'animate__delay-1s' : ($index % 3 == 2 ? 'animate__delay-2s' : '') }}">
                <img src="https://placehold.co/400x200?text={{ $lesson['img'] }}" class="card-img-top lesson-img" alt="{{ $lesson['title'] }}">
                <div class="card-body text-center">

                    <h4 class="fw-bold text-primary">📖 Bahasa Indonesia</h4>
                    <p class="text-muted">Belajar membaca dan menulis dengan cerita menyenangkan.</p>
                    <a href="{{ route('belajar-anak.bahasa') }}" class="btn btn-primary btn-fun">Mulai</a>
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
                    <a href="{{ route('belajar-anak.sains') }}" class="btn btn-warning btn-fun">Mulai</a>
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
                    <a href="{{ route('belajar-anak.agama') }}" class="btn btn-success btn-fun">Mulai</a>
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
                    <a href="{{ route('belajar-anak.literasi') }}" class="btn btn-primary btn-fun">Mulai</a>
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
                    <a href="{{ route('belajar-anak.numerasi') }}" class="btn btn-warning btn-fun">Mulai</a>
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
                    <a href="{{ route('belajar-anak.seni') }}" class="btn btn-danger btn-fun">Mulai</a>
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
                    <a href="{{ route('belajar-anak.jati-diri') }}" class="btn btn-info btn-fun">Mulai</a>

                    <h4 class="fw-bold text-{{ $lesson['color'] }}">{{ $lesson['title'] }}</h4>
                    <p class="text-muted small">{{ $lesson['desc'] }}</p>
                    <a href="/belajar-anak/{{ $lesson['link'] }}" class="btn btn-{{ $lesson['color'] }}">Mulai</a>

                </div>
            </div>
        </div>
        @endforeach
    </div>

    <!-- Tombol Kembali -->
    <div class="text-center mt-5 animate__animated animate__fadeInUp">

        <a href="/dashboard" class="btn btn-lg btn-danger btn-fun">

        <a href="/" class="btn btn-lg btn-danger">

            <i class="bi bi-arrow-left"></i> Kembali ke Halaman Utama
        </a>
    </div>
</div>
@endsection
