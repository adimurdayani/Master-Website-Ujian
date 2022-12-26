@extends('front.layouts.main')

@section('container')
<section id="about" class="about">
  <div class="container" data-aos="fade-down">
    <div class="section-title pb-0">
      <h4>{{ $title }}</h4>
    </div>
    <section class="section profile">
      <div class="row">
        <div id="carouselExampleCaptions" class="carousel slide" data-bs-ride="carousel">
          <div class="carousel-indicators">
            <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="0" class="active"
              aria-current="true" aria-label="Slide 1"></button>
            <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="1"
              aria-label="Slide 2"></button>
            <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="2"
              aria-label="Slide 3"></button>
          </div>
          <div class="carousel-inner">
            @if ($galeries)
            @foreach ($galeries as $galery)
            <div class="carousel-item @if($loop->first) active @endif">
              <img src="{{ asset('storage/' . $galery->image) }}" class="{{ $galery->id }} d-block w-100"
                alt="{{ $galery->id }}">
              <div class="carousel-caption d-none d-md-block">
                <h4>{{ $galery->title }}</h5>
                  <strong>{{ $galery->caption }}</strong>
                  <p>{{ date('l, d F Y', strtotime($galeries[0]->created_at)); }}</p>
              </div>
            </div>
            @endforeach
            @endif
          </div>
          <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleCaptions"
            data-bs-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Previous</span>
          </button>
          <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleCaptions"
            data-bs-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Next</span>
          </button>
        </div>
      </div>
    </section>
    @endsection