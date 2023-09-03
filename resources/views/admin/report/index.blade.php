@extends('admin.layouts.main')

@section('content')

<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-2 text-gray-800 text-center">Pengaduan Masyarakat</h1>

    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th class="col-1 align-middle text-center">No</th>
                            <th class="col-2">Nik</th>
                            <th class="col-2">Nama</th>
                            <th class="col-3">Judul Pengaduan</th>
                            <th class="col-1 align-middle text-center">Status</th>
                            <th class="col-2 align-middle text-center">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @if (!$reports->count())
                        <tr>
                            <td colspan="6" class="align-middle text-center">Belum ada data</td>
                        </tr>
                        @endif
                        @foreach ($reports as $report)
                        <tr>
                            <td class="col-1 align-middle text-center">{{ $loop->iteration }}</td>
                            <td>{{ $report->nik }}</td>
                            <td>{{ $report->name }}</td>
                            <td>{{ $report->title_report }}</td>
                            <td class="align-middle text-center">
                                @if ($report->status == true)
                                <p>Terverifikasi</p>
                                @else
                                <a href="{{ url('/survey/verifikasi/' . $report->id) }}"
                                    class="btn btn-success btn-icon-split" id="saveButton">
                                    <span class="text">Verifikasi</span>
                                </a>
                                @endif
                            </td>
                            <td class="align-middle text-center">

                                <a href="/admin/pengaduan-masyarakat/detail/{{ $report->id }}"
                                    class="btn btn-warning btn-circle"><i class="fa fa-eye" aria-hidden="true"></i></a>

                                <a class="btn btn-danger btn-circle" href="{{ url('/survey/hapus/' . $report->id) }}"
                                    id="deleteButton">
                                    <i class="fa fa-trash" aria-hidden="true"></i>
                                </a>

                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>

</div>
<!-- /.container-fluid -->



@endsection
