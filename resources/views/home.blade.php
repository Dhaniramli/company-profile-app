    @extends('layouts.main')


    @section('content')

    @include('partials/carousel')

    <div class="container">
        <div class="news">
            <div class="content-title">
                <h1>Berita Terbaru</h1>
            </div>
            <div class="row d-flex justify-content-center">
                @if ($posts->count())
                @foreach ($posts as $post)
                <div class="col-lg-3 col-md-4 mb-3">
                    <div class="card card-news">
                        <img src="{{ asset('storage/' . $post->image) }}" class="card-img-top" alt="">
                        <div class="card-body">
                            <a href="/news/{{ $post->slug }}" class="card-title-posts">
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
                @else
                <div class="parent-container">
                    <div class="not-found"
                        style="height: 200px; display: flex; align-items: center; justify-content: center;">
                        <p class="text-center fs-4">Tidak ada berita ditemukan!</p>
                    </div>
                </div>
                @endif

            </div>
        </div>

        {{-- {{ $posts->links() }} --}}

        <div class="gallery">
            <div class="content-title d-flex justify-content-center">
                <h1>Galeri Foto</h1>
            </div>
        </div>

        <div class="carousel-main carousel-galeri"
            data-flickity='{"autoPlay": 1500, "groupCells": true , "prevNextButtons": false, "pageDots": false}'>
            @if ($galeris->count())
            @foreach ($galeris as $galeri)
            <div class="carousel-cell carousel-inner-gallery">
                <div class="overlay">
                    <div class="card">
                        <div class="img-wrapper">
                            <img src="{{ asset('storage/' . $galeri->image) }}" alt="...">
                        </div>
                        <div class="card-body">
                            <h5 class="card-title">{{ Str::limit($galeri->title, 80, '...') }}
                            </h5>
                        </div>
                    </div>
                </div>
            </div>
            @endforeach
            @else
            <div class="parent-container">
                <div class="not-found"
                    style="height: 200px; display: flex; align-items: center; justify-content: center;">
                    <p class="text-center fs-4">Tidak ada gambar ditemukan!</p>
                </div>
            </div>
            @endif

        </div>
    </div>

   

    <div class="container-fluid survey px-0">
        <div class="container survey-content">
            <div class="col-lg-12">
                <div class="row">
                    <div class="col-lg-6">
                        <div class="survey-item">
                            <h2>Survei Kepuasan Masyarakat</h2>
                            <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Nulla libero consectetur rerum
                                adipisci
                                temporibus eaque sit cumque, corrupti voluptates iure numquam dicta dolores cum
                                voluptatem
                                quidem nihil? Unde nemo quas quia, accusantium enim cupiditate voluptatum quos
                                quibusdam?
                                Odit
                                nisi, molestiae aliquam perferendis, illum harum velit voluptate saepe eum tempore
                                doloribus?
                            </p>
                            <a href="/form-survey">
                                <button type="button" class="btn">Mulai Survey</button>
                            </a>
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="survey-img">
                            <img src="/img/Peer_review_1.png" class="d-block w-100" alt="...">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

   

    @endsection
