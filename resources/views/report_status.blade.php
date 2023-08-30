@extends('layouts.main')

@section('content')
<div class="container content-status-report">
    <h1>Daftar Pengaduan Masyarakat</h1>
    @if (session()->has('success'))
    <div class="alert alert-success" role="alert">
        {{ session('success') }}
    </div>
    @endif
    <div class="row">
        <div class="col-lg-12">
            <div class="card card-status-report">
              <table id="example" class="table table-striped" style="width:100%">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>NIK</th>
                        <th>Nama</th>
                        <th>Email</th>
                        <th>No HP</th>
                        <th>Judul Pengaduan</th>
                        <th>Isi Pengaduan</th>
                        <th>Foto</th>
                        <th>Status</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($reports as $report)
                    <tr>
                        <td class="col-1 align-middle text-center">{{ $loop->iteration }}</td>
                        <td>{{ $report->nik }}</td>
                        <td>{{ $report->name }}</td>
                        <td>{{ $report->email }}</td>
                        <td>{{ $report->phone_number }}</td>
                        <td>{{ $report->title_report }}</td>
                        <td>{!! $report->report !!}</td>
                        <td><img width="100px" src="{{ asset('storage/' . $report->image_report) }}" alt=""></td>
                        <td>NNN</td>
                    </tr>
                    @endforeach
                </tbody>
              </table>
            </div>
        </div>
    </div>
</div>

<script>
    new DataTable('#example');
</script>

@endsection
