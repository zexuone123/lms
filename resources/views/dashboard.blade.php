@extends('layouts.app')

@section('content')
<div class="container py-5">
    <h2 class="fw-bold mb-4 text-center animate__animated animate__fadeInDown">Halo, Selamat Belajar!</h2>
    <div class="row">
        @foreach([1,2,3] as $item)
        <div class="col-md-4 mb-4" data-aos="flip-left" data-aos-delay="{{ $item*100 }}">
            <div class="card card-custom h-100 shadow-sm">
                <div class="card-body text-center">
                    <h5 class="card-title fw-bold">Kursus {{ $item }}</h5>
                    <div class="progress mb-3" style="height: 10px;">
                        <div class="progress-bar bg-success" role="progressbar" style="width: {{ rand(30,90) }}%;"></div>
                    </div>
                    <a href="/courses/{{ $item }}" class="btn btn-success">Lanjutkan</a>
                </div>
            </div>
        </div>
        @endforeach
    </div>
</div>
@endsection
