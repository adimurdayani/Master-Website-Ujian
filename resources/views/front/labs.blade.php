@extends('front.layouts.main')

@section('container')
<!-- ======= About Section ======= -->
<section id="about" class="about">
    <div class="container" data-aos="fade-up">
        <div class="section-title">
            <h4 class="mb-5">Daftar Laboratorium {{ $title }}</h4>
            <div class="container">
                <div class="row">
                    @foreach ($labs as $lab)
                    <div class="col-md-4 mt-4">
                        <a>
                            <div class="card bg-dark text-white">
                                <img src="https://source.unsplash.com/600x600?{{ $lab->name }}" class="card-img"
                                    alt="{{ $lab->name }}">
                                <div class="card-img-overlay d-flex align-items-center p-0">
                                    <h5 class="card-title text-center flex-fill p-4 fs-4"
                                        style="background-color:rgba(0, 0, 0, 0.7)">{{ $lab->name }}</h5>
                                </div>
                            </div>
                        </a>
                    </div>
                    @endforeach
                </div>
                @if (request()->routeIs('informatika.labs'))
                <a href="/informatika" class="btn btn-primary bi bi-arrow-left-short">Kembali</a>
                @elseif (request()->routeIs('sipil.labs'))
                <a href="/sipil" class="btn btn-warning bi bi-arrow-left-short">Kembali</a>
                @endif
            </div>
        </div>
    </div>
</section><!-- End About Section -->
@endsection