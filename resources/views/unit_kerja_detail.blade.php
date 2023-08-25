@extends('layouts.main')

@section('content')
<div class="container content-unit-detail">
    <div class="unit-detail-top">
        <h1>{{ $unitKerja->judul }}</h1>
        <h2>Alamat : {{ $unitKerja->lokasi }}</h2>
    </div>
    <div class="unit-detail-bottom">
        <h3>Tugas & Fungsi</h3>
        <div class="detail-body">
            {!! $unitKerja->tugas_dan_fungsi !!}
        </div>
    </div>
</div>
@endsection
