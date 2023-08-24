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
                    <img src="{{ asset('storage/' . $post->image) }}" alt="">
                    <div class="card-body">
                        <a href="/news/{{ $post->slug }}" class="card-title-news">
                            <h5>{{ Str::limit($post->title, 75, '...') }}</h5>
                        </a>
                        <p class="card-text">{{ Str::limit($post->excerpt, 80, '...') }}</p>
                    </div>
                    <div class="centered-button">
                        <a href="/news/{{ $post->slug }}" class="btn btn-primary">Selengkapnya..</a>
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
