@extends('admin.layouts.main')

@section('content')

<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-2 text-gray-800 text-center">Hasil Survey Masyarakat</h1>

    <!-- DataTales Example -->
    <div class="row">
        <div class="col-lg-12">
            <div class="card shadow mb-4">
                <div class="card-header">
                    <a href="/admin/survey-masyarakat" class="btn btn-info btn-icon-split">
                        <span class="icon text-white-50">
                            <i class="fas fa-arrow-left"></i>
                        </span>
                        <span class="text">Survey Masyarakat</span>
                    </a>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                            <thead>
                                <tr>
                                    <th class="col-1 align-middle text-center">No</th>
                                    <th class="col-6">Nama</th>
                                    <th class="col-3 align-middle text-center">Pekerjaan</th>
                                    <th class="col-2 align-middle text-center">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($surveys as $survey)
                                <tr>
                                    <td class="col-1 align-middle text-center">{{ $loop->iteration }}</td>
                                    <td>{{ $survey->name }}</td>
                                    <td>{{ $survey->job }}</td>
                                    <td class="align-middle text-center">

                                        <a href="/admin/hasil-survey-masyarakat/{{ $survey->id }}"
                                            class="btn btn-success btn-circle"><i class="fa fa-eye"
                                                aria-hidden="true"></i></a>

                                        <a class="btn btn-danger btn-circle"
                                            href="{{ url('/hasil/hapus/' . $survey->id) }}" id="deleteButton">
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
    </div>

</div>
<!-- /.container-fluid -->

@endsection
