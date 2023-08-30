@extends('layouts.main')

@section('content')
<div class="container">
    <div class="kedudukan justify-content-center">
        <h1 class="text-center">KEDUDUKAN DAN ALAMAT</h1>
        @if ($positionAddress->count())
        <article class="my-3 fs-5">
            {!! $positionAddress[0]->body !!}
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
