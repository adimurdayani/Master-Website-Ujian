@extends('front.layouts.main')

@section('container')
<!-- ======= About Section ======= -->
<div class="container" data-aos="fade-up">
    <div class="section-title">
        <div class="container">
            <div class="row justify-content-center mb-5">
                <div class="col-8">
                    <h4 class="mb-3" align="justify">{{ $post->title }}</h4>
                    <div style="max-height: 350px; overflow:hidden;">
                        <img src="{{ asset('storage/' . $post->image) }}" alt="{{ $post->category->name }}"
                            class="img-fluid">
                    </div>
                    <p class="nonaktif-link" style="font-size: 80%">Oleh. <a
                            href="/posts?author={{ $post->author->user_name }}" class="text-decoration-none"> {{
                            $post->author->name }} </a> categori <a href="/posts?category={{ $post->category->slug }}"
                            class="text-decoration-none">{{ $post->category->name }}</a></p>
                    <article class="my-3 fs-5" align="justify">
                        {!! $post->body !!}
                    </article>
                    @if (request()->routeIs('informatika.kelompok'))
                    <a href="/informatika/kelompoks" class="btn btn-primary bi bi-arrow-left-short">Kembali</a>
                    @elseif (request()->routeIs('sipil.kelompok'))
                    <a href="/sipil/kelompoks" class="btn btn-warning bi bi-arrow-left-short">Kembali</a>
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>
@endsection