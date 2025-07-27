@extends('layouts.app')

@section('content')
<div class="container py-5">
    <h2 class="fw-bold text-warning mb-4 animate__animated animate__fadeInDown">🔢 Numerasi</h2>

    <div class="mb-4 text-center">
        <iframe width="560" height="315" src="https://www.youtube.com/embed/Wu-0B6xyvEo"
            title="Video Numerasi" frameborder="0" allowfullscreen class="shadow-lg rounded animate__animated animate__zoomIn"></iframe>
    </div>

    <div class="card p-4 shadow-sm mb-4 animate__animated animate__fadeInUp">
        <h5 class="fw-bold">Materi Hari Ini</h5>
        <p>Memahami konsep bilangan dan pola matematika sederhana.</p>
    </div>

    <div class="card p-4 shadow-sm animate__animated animate__fadeInUp">
        <h5 class="fw-bold mb-3">Kuis Cepat</h5>
        <p>Berapakah hasil 10 - 4?</p>
        <button class="btn btn-outline-success btn-fun me-2" onclick="alert('Benar! 🎉')">6</button>
        <button class="btn btn-outline-danger btn-fun" onclick="alert('Ups, coba lagi!')">5</button>
    </div>

    <div class="text-center mt-5">
        <a href="/belajar-anak" class="btn btn-danger btn-fun"><i class="bi bi-arrow-left"></i> Kembali</a>
    </div>
</div>
@endsection
