@extends('admin.layouts.main')

@section('content')

<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-2 text-gray-800 text-center">Galeri</h1>
    @if (session()->has('success'))
    <div class="alert alert-success" role="alert">
        {{ session('success') }}
    </div>
    @endif

    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header">
            <a href="/admin/galeri/create" class="btn btn-primary btn-icon-split">
                <span class="icon text-white-50">
                    <i class="fa fa-plus-circle" aria-hidden="true"></i>
                </span>
                <span class="text">Buat baru</span>
            </a>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th class="col-1 align-middle text-center">No</th>
                            <th class="col-6">Judul Gambar</th>
                            <th class="col-3">Gambar</th>
                            <th class="col-2">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($galeris as $galeri)
                        <tr>
                            <td class="col-1 align-middle text-center">{{ $loop->iteration }}</td>
                            <td>{{ $galeri->title }}</td>
                            <td class="align-middle text-center"><img src="{{ asset('storage/' . $galeri->image) }}" alt="" style="height: 100px; width: 200px;"></td>
                            <td class="align-middle text-center">
                                <a href="/admin/galeri/{{ $galeri->id }}/edit" class="btn btn-warning btn-circle"><i class="fa fa-keyboard"
                                        aria-hidden="true"></i></a>
                                <form action="/admin/galeri/{{ $galeri->id }}" method="POST" class="d-inline">
                                    @method('delete')
                                    @csrf
                                    <button class="btn btn-danger btn-circle" onclick="return confirm('Are you sure?')"><i class="fa fa-trash"
                                            aria-hidden="true"></i></button>
                                </form>
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
