@extends('front.layouts.main')

@section('container')
<!-- ======= About Section ======= -->
<section id="about" class="about">
    <div class="container" data-aos="fade-up">
        <div class="section-title">
            <h4 class="mb-3 text-center">{{ $title }}</h4>
            <strong class="mb-3 text-center">{{ $prodi }}</strong>

            <div class="row justify-content-center mb-3">
                <div class="col-md-6">
                    <form action="/posts">

                        @if (request('category'))
                        <input type="hidden" name="category" value="{{ request('category') }}">

                        @endif

                        @if (request('author'))
                        <input type="hidden" name="author" value="{{ request('author') }}">

                        @endif
                    </form>
                </div>
            </div>

            @if ($posts->count())
            <div class="card mb-3">
                <div style="max-height: 450px; overflow:hidden;">
                    <img src="{{ asset('storage/' . $posts[0]->image) }}" alt="{{ $posts[0]->category->name }}"
                        class="img-fluid">
                </div>
                <div class="card-body text-center">
                    <strong class="nonaktif-link" class="card-title"> <a href="/posts/{{ $posts[0]->slug }}"
                            class="text-decoration-none text-dark">{{ $posts[0]->title }}</a></strong>
                    <p class="nonaktif-link">
                        <small class="text-muted" style="font-size: 80%">
                            Oleh. <a href="/posts?author={{ $posts[0]->author->user_name }}"
                                class="text-decoration-none"> {{ $posts[0]->author->name }} </a> categori <a
                                href="/posts?category={{ $posts[0]->category->slug }}" class="text-decoration-none">{{
                                $posts[0]->category->name }}</a> {{ date('l, d F Y', strtotime($posts[0]->created_at));
                            }}
                        </small>
                    </p>

                    <p class="card-text mb-3">{{ $posts[0]->exerpt }}</p>
                    @if (request()->routeIs('informatika.strukturs'))
                    <a href="/informatika/strukturs/{{ $posts[0]->slug }}"
                        class="text-decoration-none btn btn-primary">Selengkapnya</a>
                    @elseif (request()->routeIs('sipil.strukturs'))
                    <a href="/sipil/strukturs/{{ $posts[0]->slug }}"
                        class="text-decoration-none btn btn-warning">Selengkapnya</a>
                    @endif

                </div>
            </div>

            <div class="d-flex justify-content-end">
                {{ $posts->links() }}
            </div>

            <div class="container">
                <div class="row">
                    @foreach ($posts->skip(1) as $post)

                    <div class="col-md-4 mb-3">
                        <div class="card">
                            <div class="position-absolute px-3 py-2 nonaktif-link"><a
                                    href="/posts?category={{ $post->category->slug }}"
                                    class="text-white text-decoration-none">{{ $post->category->name }}</a></div>
                            <img src="{{ asset('storage/' . $post->image) }}" alt="{{ $post->category->name }}"
                                class="img-fluid" style="max-height: 200px;">
                            <div class="card-body">
                                <strong class="card-title">{{ $post->title }}</strong>
                                <p class="nonaktif-link">
                                    <small class="text-muted" style="font-size: 80%">
                                        Oleh. <a href="/posts?author={{ $post->author->user_name }}"
                                            class="text-decoration-none"> {{ $post->author->name }} </a> categori <a
                                            href="/posts?category={{ $post->category->slug }}"
                                            class="text-decoration-none">{{ $post->category->name }}</a> {{ date('l, d F
                                        Y', strtotime($post->created_at)); }}
                                    </small>
                                </p>
                                <p class="card-text mb-3">{{ $post->exerpt }}</p>
                                @if (request()->routeIs('informatika.strukturs'))
                                <a href="/informatika/strukturs/{{ $post->slug }}"
                                    class="btn btn-primary">Selengkapnya</a>
                                @elseif (request()->routeIs('sipil.strukturs'))
                                <a href="/sipil/strukturs/{{ $post->slug }}" class="btn btn-warning">Selengkapnya</a>
                                @endif
                            </div>
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>

            @else
            <p class="text-center fs-4">Belum Ada Postingan.</p>
            @endif

        </div>
    </div>
</section><!-- End About Section -->
@endsection