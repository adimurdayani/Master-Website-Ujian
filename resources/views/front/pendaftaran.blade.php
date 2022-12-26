@extends('front.layouts.main')

@section('container')
<section id="portfolio" class="portfolio section-bg">
    <div class="container" data-aos="zoom-in" data-aos-delay="100">
        <div class="section-title">
            <h4>Informasi Pendaftaran Laboratorium</h4>
            <br>
            <br>
            <br>
            <br>
            <br>
            <br>
            <br>
            <br>
            <br>
            <br>
            <br>
            <br>
            <br>
            @if (request()->routeIs('informatika.pendaftaran'))
            <p>Silahkan Download Aplikasi MyLab di HP Android Anda Melalui Playstore Untuk Melihat Informasi Seputar
                Pendaftaran Sekaligus Melakukan Pendaftaran Melalui Aplikasi Tersebut.</p>
            @elseif (request()->routeIs('sipil.pendaftaran'))
            <p>Silahkan Kunjungi Laboratorium Teknik Sipil Universitas Andi Djemma Palopo Jl. Tandipau keluntuk melihat
                seputar informasi serta melakukan pendaftaran.</p>
            @endif
            <br>
            <br>
            <br>
            <br>
            <br>
            <br>
            <br>
            <br>
            <br>
            <br>
            <br>
            @if (request()->routeIs('informatika.pendaftaran'))
            <a href="/informatika" class="btn btn-primary bi bi-arrow-left-short">Kembali</a>
            @elseif (request()->routeIs('sipil.pendaftaran'))
            <a href="/sipil" class="btn btn-warning bi bi-arrow-left-short">Kembali</a>
            @endif
        </div>
    </div>
</section>
@endsection