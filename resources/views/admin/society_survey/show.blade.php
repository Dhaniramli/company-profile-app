@extends('admin.layouts.main')

@section('content')

<div class="container">
    <div class="card shadow mb-4">
        <div class="card-header">
            <a href="/admin/hasil-survey-masyarakat" class="btn btn-info btn-icon-split">
                <span class="icon text-white-50">
                    <i class="fas fa-arrow-left"></i>
                </span>
                <span class="text">Kembali</span>
            </a>
        </div>
        <div class="card-body">
            <div class="row my-3">
                <div class="col-lg-12">
                    <h3 class="text-center">Data Diri</h3>
                    <table>
                            <tr>
                                <td>Nama</td>
                                <td style="padding: 10px;">:</td>
                                <td>{{ $survey->name }}</td>
                            </tr>
                            <tr>
                                <td>Jenis kelamin</td>
                                <td style="padding: 10px;">:</td>
                                <td>{{ $survey->jender }}</td>
                            </tr>
                            <tr>
                                <td>Pekerjaan</td>
                                <td style="padding: 10px;">:</td>
                                <td>{{ $survey->job }}</td>
                            </tr>
                            <tr>
                                <td>Email</td>
                                <td style="padding: 10px;">:</td>
                                <td>{{ $survey->email }}</td>
                            </tr>

                            <tr>
                                <td>Komentar</td>
                                <td style="padding: 10px;">:</td>
                                <td>{{ $survey->comment }}</td>
                            </tr>
                    </table>

                    <hr>
                    <h3 class="text-center">Kuesioner</h3>
                    @foreach ($results as $result)
                        <div class="result">
                            <table class="mb-3">
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>.</td>
                                    <td>{{ $result->question_result }}</td>
                                </tr>
                                <tr>
                                    <td></td>
                                    <td></td>
                                    <td>{{ $result->answer_result }}</td>
                                </tr>
                            </table>
                        </div>
                    @endforeach


                </div>
            </div>
        </div>
    </div>
</div>

@endsection
