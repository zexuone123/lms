@extends('layouts.app')

@section('content')
<!-- Hero Section -->
<section class="hero-section text-center py-5 animate__animated animate__fadeInDown">
    <div class="container">
        <h1 class="display-4 fw-bold mb-3">Belajar Jadi Menyenangkan!</h1>
        <p class="lead mb-4">Akses ratusan kursus seru untuk anak-anak dengan tampilan penuh warna & animasi.</p>
        <a href="/courses" class="btn btn-warning btn-lg btn-fun">Mulai Belajar</a>

        <img src="https://placehold.co/500x300?text=Ilustrasi+Anak+Belajar" 
             class="img-fluid mt-4 rounded animate__animated animate__zoomIn" alt="Ilustrasi">
    </div>
</section>

<!-- Kursus Populer -->
<section class="py-5 bg-light">
    <div class="container">
        <h2 class="fw-bold mb-4 text-center" data-aos="fade-up">Kursus Populer</h2>
        <div class="row">
            @foreach([1,2,3] as $item)
            <div class="col-md-4 mb-4" data-aos="zoom-in" data-aos-delay="{{ $item*100 }}">
                <div class="card card-custom shadow-sm h-100">
                    <img src="https://placehold.co/400x200?text=Kursus+{{ $item }}" class="card-img-top" alt="Kursus">
                    <div class="card-body text-center">
                        <h5 class="card-title fw-bold">Kursus {{ $item }}</h5>
                        <p class="card-text text-muted">Belajar dengan cara yang menyenangkan dan interaktif.</p>
                        <a href="/courses/{{ $item }}" class="btn btn-primary btn-fun">Lihat Detail</a>

                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</section>
@endsection
