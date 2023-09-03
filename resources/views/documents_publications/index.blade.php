@extends('layouts.main')

@section('content')
<div class="container content-status-report">
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
                        <th class="col-1">No</th>
                        <th class="col-9">Judul</th>
                        <th class="col-2 align-middle text-center">File</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($sakips as $sakip)
                    <tr>
                        <td class="col-1 align-middle text-center">{{ $loop->iteration }}</td>
                        <td>{{ $sakip->title }}</td>
                        <td class="align-middle text-center">
                            <a href="{{ url('/file/download/' . $sakip->id) }}"
                                class="btn btn-success btn-icon-split">
                                <span class="text">Download</span>
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

<script>
    new DataTable('#example');
</script>

@endsection
