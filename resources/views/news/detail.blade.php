@extends('layouts/main')

@section('content')

<div class="container content-post">
    <div class="row justify-content-center mb-5">
        <h2 class="mb-3">{{ $post->title }}</h2>
        <div class="col-md-10 mt-4">
            {{-- @if ($post->image) --}}
            <div class="img-post">
                <img src="{{ asset('storage/' . $post->image) }}" alt=""
                    class="img-fluid">
            </div>
            {{-- @else
            <img src="https://source.unsplash.com/1200x400?{{ $post->category->name }}"
                alt="{{ $post->category->name }}" class="img-fluid">
            @endif --}}

            <article class="my-3 fs-5">
                {!! $post->body !!}
            </article>

        </div>
    </div>
</div>

@endsection
