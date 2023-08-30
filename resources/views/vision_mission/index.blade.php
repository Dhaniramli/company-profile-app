@extends('layouts.main')

@section('content')
<div class="container">
    <div class="visi-misi justify-content-center">
        @if ($vision_mission->count())
        @if ($vision_mission[0]->image)
        <div class="img-top">
            <img src="{{ asset('storage/' . $vision_mission[0]->image) }}" alt="Gambar">
        </div>
        @endif
        <h1 class="text-center">{{ $vision_mission[0]->title }}</h1>
        <article class="my-3 fs-5">
            {!! $vision_mission[0]->body !!}
        </article>
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
