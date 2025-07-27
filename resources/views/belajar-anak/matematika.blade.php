@extends('layouts.app')

@section('content')
<div class="container py-5">
    <h2 class="fw-bold text-success mb-4 animate__animated animate__fadeInDown">📐 Belajar Matematika Dasar</h2>

    <!-- Video Pembelajaran -->
    <div class="mb-4 text-center">
        <iframe width="560" height="315" src="https://www.youtube.com/embed/tb1p0no_1Cg"
            title="Video Matematika" frameborder="0" allowfullscreen
            class="shadow-lg rounded animate__animated animate__zoomIn"></iframe>
    </div>

    <!-- Materi Singkat -->
    <div class="card p-4 shadow-sm mb-4 animate__animated animate__fadeInUp">
        <h5 class="fw-bold">Materi Hari Ini</h5>
        <p>Hari ini kita akan belajar tentang penjumlahan dan pengurangan sederhana.</p>
    </div>

    <!-- Kuis Interaktif -->
    <div class="card p-4 shadow-sm animate__animated animate__fadeInUp">
        <h5 class="fw-bold mb-3">Kuis Cepat</h5>
        <p>Berapakah hasil 5 + 3?</p>
        <button class="btn btn-outline-success btn-fun me-2" onclick="alert('Benar! 🎉')">8</button>
        <button class="btn btn-outline-danger btn-fun" onclick="alert('Ups, coba lagi!')">7</button>
    </div>

    <div class="text-center mt-5">
        <a href="/belajar-anak" class="btn btn-danger btn-fun"><i class="bi bi-arrow-left"></i> Kembali</a>
    </div>
</div>
@endsection
