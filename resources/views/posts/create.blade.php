@extends('layouts.app')

@section('content')
<div class="main-content">
    <section class="section">
        <div class="section-header">
            <h1>Tambah Postingan</h1>
        </div>

        <div class="section-body">

            <div class="card">
                <div class="card-header">
                    <h4><i class="fas fa-address-card"></i> Tambah Postingan</h4>
                </div>

                <div class="card-body">
                    <form action="{{ route('posts.store') }}" method="post" enctype="multipart/form-data">
                        @csrf

                        <div class="form-group">
                            <label>Tilte</label>
                            <textarea name="title" id="title" cols="30" rows="30" class="form-control">{{ old('title') }}</textarea>
                            @error('title')
                            <div class="invalid-feedback" style="display: block">
                                {{ $message }}
                            </div>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label>Slug</label>
                            <input type="text" name="slug" id="slug" cols="30" rows="30" class="form-control">{{ old('slug') }}
                            @error('slug')
                            <div class="invalid-feedback" style="display: block">
                                {{ $message }}
                            </div>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label>category</label>
                            <select class="form-control select-category @error('category_id') is-invalid @enderror" name="category_id">
                                <option value="">- SELECT category -</option>
                                @foreach ($categories as $category)
                                    <option value="{{ $category->id }}">{{ $category->name }}</option>
                                @endforeach
                            </select>
                            @error('category_id')
                            <div class="invalid-feedback" style="display: block">
                                {{ $message }}
                            </div>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label>Laboratorium</label>
                            <select class="form-control select-lab @error('lab_id') is-invalid @enderror" name="lab_id">
                                <option value="">- SELECT Laboratorium -</option>
                                @foreach ($labs as $lab)
                                    <option value="{{ $lab->id }}">{{ $lab->name }}</option>
                                @endforeach
                            </select>
                            @error('lab_id')
                            <div class="invalid-feedback" style="display: block">
                                {{ $message }}
                            </div>
                            @enderror
                        </div>

                            <div class="col-3">
                                <div class="form-group">
                                    <label for="image" class="form-label">Gambar</label>
                                    <img  class="img-preview img-fluid mb-9 col-sm-5">
                                    <input class="form-control @error('image') is-invalid @enderror" type="file" id="image" name="image" onchange="previewImage()">
                                    @error('image')
                                        <div class="invalid-feedback">
                                          {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group">
                                <label>Body</label>
                                <input id="body" type="hidden" name="body" value="{{ old('body') }}">
                                <trix-editor input="body"></trix-editor>
                                @error('body')
                                <p class="text-danger">{{ $message }}</p>
                                @enderror
                            </div>

                        <button class="btn btn-primary mr-1 btn-submit" type="submit"><i class="fa fa-paper-plane"></i>SIMPAN</button>
                        <button class="btn btn-warning btn-reset" type="reset"><i class="fa fa-redo"></i> RESET</button>

                    </form>
                </div>
            </div>
        </div>
    </section>
</div>

<script>
    const title = document.querySelector("#title");
    const slug = document.querySelector("#slug");

        title.addEventListener("keyup", function() {
            let preslug = title.value;
            preslug = preslug.replace(/ /g,"-");
            slug.value = preslug.toLowerCase();
        });

    document.addEventListener('trix-file-accept', function(e) {
    e.preventDefault();
    })
    function previewImage() {
    const image = document.querySelector('#image');
    const imgPreview = document.querySelector('.img-preview');

    imgPreview.style.display = 'block';

    const oFReader = new FileReader();
    oFReader.readAsDataURL(image.files[0]);

    oFReader.onload = function(oFREvent) {
        imgPreview.src = oFREvent.target.result;
    }
    }
</script>
@stop