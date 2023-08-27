@extends('layouts.main')

@section('content')
<div class="container">
    <div class="tugas-fungsi justify-content-center">
        <h1 class="text-center">TUGAS DAN FUNGSI</h1>
        <article class="my-3 fs-5">
            {{-- {!! $post->body !!} --}}
            {!! $jobFunctions[0]->body !!}
        </article>
    </div>
</div>
@endsection
