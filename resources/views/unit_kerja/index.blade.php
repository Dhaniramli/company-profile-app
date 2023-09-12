@extends('layouts.main')

@section('content')
<div class="container content-unit-kerja">
    <div class="container isi-unit-kerja">
        <div class="col-lg-12">
            <div class="row d-flex justify-content-center">
                @if ($unitKerjas->count())
                @foreach ($unitKerjas as $unitKerja)
                <div class="col-lg-4 col-md-6 mb-3">
                    <a href="/unit-kerja/{{ $unitKerja->slug }}" class="text-decoration-none">
                        <div class="card card-unit-kerja">
                            <div class="card-top">
                                <h1 class="card-name">{{ Str::limit($unitKerja->title, 105, '...') }}</h1>
                            </div>
                            <div class="card-bottom">
                                <h2 class="card-jabatan">Lokasi : {{ Str::limit($unitKerja->location, 70, '...') }}</h2>
                            </div>
                        </div>
                    </a>
                </div>
                @endforeach
                @else
                <div class="parent-container">
                    <div class="not-found" style="height: 200px; display: flex; align-items: center; justify-content: center;">
                        <p class="text-center fs-4">Tidak ada Unit Kerja ditemukan!</p>
                    </div>
                </div>
                @endif
             
            </div>
        </div>
    </div>
</div>

@endsection
