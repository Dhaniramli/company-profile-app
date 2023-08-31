@extends('layouts.main')

@section('content')
<div class="container content-data-pejabat">
    <div class="title-data-pejabat justify-content-center">
        <h1 class="text-center">DATA PEJABAT</h1>
    </div>
    <div class="container isi-data-pejabat">
        <div class="col-lg-12">
            <div class="row d-flex justify-content-center">
                @foreach ($pejabats as $pejabat)
                <div class="col-lg-3 col-md-6 mb-3">
                    <div class="card card-pejabat">
                        <div class="card-img">
                            <img src="{{ asset('storage/' . $pejabat->image) }}" class="card-img-top" alt="...">
                        </div>
                        <div class="card-body">
                            <h1 class="card-name">{{ $pejabat->name }}</h1>
                            <h2 class="card-jabatan">{{ $pejabat->position }}</h2>
                            <h3 class="card-nomor">{{ $pejabat->number }}</h3>
                        </div>
                    </div>
                </div>
                @endforeach
                @if ($pejabats->count() === 0)
                <p class="text-center fs-4">Tidak ada data ditemukan.</p>
                @endif
            </div>
        </div>
    </div>
</div>

@endsection
