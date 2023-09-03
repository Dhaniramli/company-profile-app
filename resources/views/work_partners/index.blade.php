@extends('layouts.main')

@section('content')
<div class="container content-mitra-kerja">
    <div class="title-mitra-kerja d-flex justify-content-center">
        <h1>Mitra Kerja</h1>
    </div>
    <div class="container isi-mitra-kerja">
        <div class="col-lg-12">
            <div class="row d-flex justify-content-center">
                @if ($workPartners->count())
                @foreach ($workPartners as $workPartner)
                <div class="col-lg-4 col-md-6 mb-3">
                    <div class="card card-mitra-kerja">
                        <div class="card-top">
                            <img src="{{ asset('storage/' . $workPartner->image) }}" alt="Gambar">
                        </div>
                        <div class="card-bottom">
                            <h2 class="card-jabatan">{{ $workPartner->title }}</h2>
                        </div>
                    </div>
                </div>
                @endforeach
                @else
                <div class="parent-container">
                    <div class="not-found"
                        style="height: 200px; display: flex; align-items: center; justify-content: center;">
                        <p class="text-center fs-4">404 Not Found!</p>
                    </div>
                </div>
                @endif
            </div>
        </div>
    </div>
</div>

@endsection
