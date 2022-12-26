@extends('front.layouts.main')

@section('container')
<section id="hero" class="hero d-flex align-items-center">
  <div class="container">
    <div class="row">
      <div class="col-lg-6 d-flex flex-column justify-content-center">
        <h4 data-aos="fade-up">Selamat Datang di Halaman Respon Online</h4>
        <br>
        <small data-aos="fade-up" class="text-muted" data-aos-delay="400">Silahkan Klik Tombol di Bawah Untuk Mulai
          Mengerjakan
          Respon</small>
        <br>
        @if (request()->routeIs('informatika.respon'))
        <div data-aos="fade-up" data-aos-delay="600">
          <div class="text-center text-lg-start">
            <a href="/login"
              class="btn btn-outline-primary d-inline-flex align-items-center justify-content-center align-self-center">
              <span>Mulai Respon</span>
              <i class="bi bi-arrow-right"></i>
            </a>
          </div>
        </div>
        @elseif(request()->routeIs('sipil.respon'))
        <div data-aos="fade-up" data-aos-delay="600">
          <div class="text-center text-lg-start">
            <a href="/login"
              class="btn btn-outline-warning d-inline-flex align-items-center justify-content-center align-self-center">
              <span>Mulai Respon </span>
              <i class="bi bi-arrow-right"></i>
            </a>
          </div>
        </div>
        @endif
      </div>
      <div class="col-lg-6 hero-img" data-aos="zoom-out" data-aos-delay="200">
        <img src="assets/img/hero-img.png" class="img-fluid" alt="">
      </div>
    </div>
  </div>

</section><!-- End Hero -->
@endsection