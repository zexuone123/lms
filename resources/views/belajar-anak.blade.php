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
        <a href="/" class="btn btn-lg btn-danger">
            <i class="bi bi-arrow-left"></i> Kembali ke Halaman Utama
        </a>
    </div>
</div>
@endsection
