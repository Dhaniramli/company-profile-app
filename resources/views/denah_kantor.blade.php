@extends('layouts.main')

@section('content')
<div class="container denah-kantor">
    <div class="title-denah-kantor justify-content-center">
        <h1 class="text-center">Denah Kantor</h1>
    </div>
    <div class="denah-img justify-content-center">
        @if ($office_plan->count())
        <div class="img-top">
            <img src="{{ asset('storage/' . $office_plan[0]->image) }}" alt="Gambar Denah Kantor">
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
