@extends('layouts.main')

@section('content')
<div class="container content-galeri">
    <div class="title-galeri d-flex justify-content-center">
        <h1>Galeri Kegiatan</h1>
    </div>
    <div class="container isi-galeri">
        <div class="col-lg-12">
            <div class="row d-flex justify-content-center">
                @foreach ($galeris as $galeri)
                <div class="col-lg-4 col-md-6 mb-3">
                    <div class="card card-galeri">
                        <div class="card-top">
                            <img src="{{ asset('storage/' . $galeri->image) }}" alt="Gambar">
                        </div>
                        <div class="card-bottom">
                            <h2 class="card-jabatan">{{ $galeri->title }}</h2>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </div>
</div>

@endsection
