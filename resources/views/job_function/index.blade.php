@extends('layouts.main')

@section('content')
<div class="container">
    <div class="tugas-fungsi justify-content-center">
        <h1 class="text-center">TUGAS DAN FUNGSI</h1>
        @if ($jobFunctions->count())
        <article class="my-3 fs-5">
            {!! $jobFunctions[0]->body !!}
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
