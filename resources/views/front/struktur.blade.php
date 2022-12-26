@extends('front.layouts.main')

@section('container')
<!-- ======= About Section ======= -->
<div class="container" data-aos="fade-up">
    <div class="section-title">
        <div class="container">
            <div class="row justify-content-center mb-5">
                <div class="col-8">
                    <h5 class="mb-3 text-center" align="justify">{{ $post->title }}</h5>
                    <div style="max-height: 350px; overflow:hidden;">
                        <img src="{{ asset('storage/' . $post->image) }}" alt="{{ $post->category->name }}"
                            class="img-fluid">
                    </div>
                    <small class="text-muted">Oleh. <a href="/posts?author={{ $post->author->user_name }}"
                            class="text-decoration-none"> {{
                            $post->author->name }} </a> categori <a href="/posts?category={{ $post->category->slug }}"
                            class="text-decoration-none">{{ $post->category->name }}</a></small>
                    <article class="mt-3 mb-3" align="justify">
                        {!! $post->body !!}
                    </article>
                    @if (request()->routeIs('informatika.struktur'))
                    <a href="/informatika/strukturs" class="btn btn-primary bi bi-arrow-left-short">Kembali</a>
                    @elseif (request()->routeIs('sipil.struktur'))
                    <a href="/sipil/strukturs" class="btn btn-warning bi bi-arrow-left-short">Kembali</a>
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>
@endsection