@extends('layouts.main')

@section('content')
<div class="container content-unit-detail">
    <div class="unit-detail-top">
        <h1>{{ $unitKerja->title }}</h1>
        <h2>Alamat : {{ $unitKerja->location }}</h2>
    </div>
    <div class="unit-detail-bottom">
        <h3>Tugas & Fungsi</h3>
        <div class="detail-body">
            {!! $unitKerja->job_function !!}
        </div>
    </div>
</div>
@endsection
