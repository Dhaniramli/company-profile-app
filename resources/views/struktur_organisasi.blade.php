@extends('layouts.main')

@section('content')
<div class="container content-struktur-organisasi">
    <div class="title-struktur-organisasi justify-content-center">
        <h1 class="text-center">STRUKTUR ORGANISASI</h1>
    </div>
    <div class="struktur-organisasi-img justify-content-center">
        @if ($struktur_organisasi->count())
        <div class="img-top">
            <img src="{{ asset('storage/' . $struktur_organisasi[0]->image) }}" alt="Gambar Struktur organisasi">
        </div>
        @else
        <div class="parent-container">
            <div class="not-found" style="height: 200px; display: flex; align-items: center; justify-content: center;">
                <p class="text-center fs-4">404 Not Found!</p>
            </div>
        </div>
        @endif
    </div>
</div>
@endsection
