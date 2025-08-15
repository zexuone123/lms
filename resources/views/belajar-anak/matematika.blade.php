@extends('layouts.app')

@section('content')
<div class="container py-5">
    <h2 class="fw-bold text-success mb-4 animate__animated animate__fadeInDown">📐 Belajar Matematika Dasar</h2>
    <p class="text-muted mb-5">Pilih materi yang ingin kamu pelajari!</p>

    <div class="row g-4">
        <!-- Perkalian -->
        <div class="col-md-4 col-12">
            <div class="card text-center shadow-lg p-4 lesson-card animate__animated animate__zoomIn">
                <i class="bi bi-x-lg display-4 text-primary mb-3"></i>
                <h5 class="fw-bold">Perkalian</h5>
                <p class="small text-muted">Pelajari konsep perkalian dari dasar hingga mahir.</p>
                <a href="{{ route('materi.perkalian.index') }}" class="btn btn-primary btn-sm mt-2">Pilih</a>
            </div>
        </div>

        <!-- Pecahan -->
        <div class="col-md-4 col-12">
            <div class="card text-center shadow-lg p-4 lesson-card animate__animated animate__zoomIn animate__delay-1s">
                <i class="bi bi-slash-lg display-4 text-success mb-3"></i>
                <h5 class="fw-bold">Pecahan</h5>
                <p class="small text-muted">Belajar penjumlahan, pengurangan, dan perkalian pecahan.</p>
                <a href="{{ route('materi.pecahan.index') }}" class="btn btn-success btn-sm mt-2">Pilih</a>
            </div>
        </div>

        <!-- Operasi Angka -->
        <div class="col-md-4 col-12">
            <div class="card text-center shadow-lg p-4 lesson-card animate__animated animate__zoomIn animate__delay-2s">
                <i class="bi bi-plus-slash-minus display-4 text-warning mb-3"></i>
                <h5 class="fw-bold">Operasi Angka</h5>
                <p class="small text-muted">Pelajari penjumlahan, pengurangan, perkalian, dan pembagian.</p>
                <a href="{{ route('materi.operasi-angka.index') }}" class="btn btn-warning btn-sm mt-2">Pilih</a>
            </div>
        </div>
    </div>

    <div class="text-center mt-5">
        <a href="/belajar-anak" class="btn btn-danger btn-fun">
            <i class="bi bi-arrow-left"></i> Kembali
        </a>
    </div>
</div>

<style>
.lesson-card {
    border-radius: 20px;
    transition: transform 0.3s ease, box-shadow 0.3s ease;
}
.lesson-card:hover {
    transform: translateY(-5px);
    box-shadow: 0 8px 20px rgba(0,0,0,0.2);
}
</style>
@endsection
