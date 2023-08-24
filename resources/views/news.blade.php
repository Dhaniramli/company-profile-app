@extends('layouts.main')

@section('content')
<div class="container">
    <div class="news-kegiatan">
        <div class="content-news d-flex justify-content-center">
            <h1>Berita Kegiatan</h1>
        </div>
        <div class="row d-flex justify-content-center">
            @foreach ($posts as $post)
            <div class="col-lg-3 col-md-4 mb-3">
                <div class="card card-news">
                    <img src="https://source.unsplash.com/500x300?programming" class="card-img-top" alt="">
                    <div class="card-body">
                        <h5 class="card-title">{{ $post->title }}</h5>
                        <p class="card-text">{{ $post->excerpt }}</p>
                        <div class="centered-button">
                            <a href="/news/{{ $post->slug }}" class="btn btn-primary">Read more</a>
                        </div>
                    </div>
                </div>
            </div>
            @endforeach

            @if ($posts->count() === 0)
            <p class="text-center fs-4">Tidak ada berita ditemukan.</p>
            @endif
        </div>
    </div>
</div>
@endsection
