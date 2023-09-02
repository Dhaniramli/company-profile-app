@extends('admin.layouts.main')

@section('content')

<div class="container">
    <div class="row my-3">
        
        <div class="col-lg-6">
            <div class="card shadow mb-4">
                <div class="card-body">
                    <a href="/admin/pengaduan-masyarakat" class="btn btn-primary btn-icon-split">
                        <span class="icon text-white">
                            <i class="fas fa-arrow-left"></i>
                        </span>
                        <span class="text">kembali</span>
                    </a>

                    <table>
                        <tr>
                            <td>NIK</td>
                            <td style="padding: 10px;">:</td>
                            <td>{{ $report->nik }}</td>
                        </tr>
                        <tr>
                            <td>Nama Lengkap</td>
                            <td style="padding: 10px;">:</td>
                            <td>{{ $report->name }}</td>
                        </tr>
                        <tr>
                            <td>Email</td>
                            <td style="padding: 10px;">:</td>
                            <td>{{ $report->email }}</td>
                        </tr>
                        <tr>
                            <td>Nomor Telpon</td>
                            <td style="padding: 10px;">:</td>
                            <td>{{ $report->phone_number }}</td>
                        </tr>
                        <tr>
                            <td>Judul</td>
                            <td style="padding: 10px;">:</td>
                            <td>{{ $report->title_report }}</td>
                        </tr>
                        <tr>
                            <td>Pengaduan</td>
                            <td style="padding: 10px;">:</td>
                        </tr>
                        <tr>
                            <td style="padding-left: 20px;">{!! $report->report !!}</td>
                        </tr>
                    </table>

                </div>
            </div>
        </div>
        <div class="col-lg-6">
            <div class="card shadow mb-4">
                <div class="card-body">

                    <div class="gambar-aduan mb-5">
                        <h5 class="text-center">Gambar Pengaduan</h5>
                        <img src="{{ asset('storage/' . $report->image_report) }}" alt="Gambar Pengaduan" width="100%"
                            class="rounded">
                    </div>

                    <div class="gambar-ktp">
                        <h5 class="text-center">Gambar KTP</h5>
                        <img src="{{ asset('storage/' . $report->image_ktp) }}" alt="Gambar KTP" width="100%"
                            class="rounded">
                    </div>

                </div>
            </div>
        </div>
    </div>
</div>

@endsection
