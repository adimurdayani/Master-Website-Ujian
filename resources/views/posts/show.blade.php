@extends('layouts.app')

@section('content')

<div class="main-content">
    <section class="section">
        <div class="section-header">
            <h1>Post Detail</h1>
        </div>

        <div class="section-body">

            <div class="card">
                <div class="card-header">
                    <h2><i class="fas fa-exam"></i> {{ $post->title }} </h2>
                </div>
                <div class="card-body">
                    <center>
                    <div style="max-height: 350px; overflow:hidden; ">
                        <img src="{{ asset('storage/' . $post->image) }}" alt="{{ $post->category->name }}" class="img-fluid mt-3">
                    </div>
                    </center>
                    <article class="my-3 fs-5">
                        {!! $post->body !!}
                    </article>
                </div>

                <div class="card-footer">
                    <a onclick="goBack()" class="btn btn-info btn-lg" role="button" aria-pressed="true">KEMBALI</a>
                </div>
            </div>
        </div>
    </section>
</div>

<script type="text/javascript">
    function goBack() {
    window.history.back();
    }
</script>

@stop