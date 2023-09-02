@extends('layouts.main')

@section('content')
<div class="container content-create-report">
    @if (session()->has('success'))
    <div class="alert alert-success" role="alert">
        {{ session('success') }}
    </div>
    @endif
    <div class="row">
        <div class="col-lg-12">
            <div class="card card-create-report">
                <h1>Data Diri</h1>
                <form method="POST" action="/pengaduan/create" enctype="multipart/form-data">
                    @csrf
                    <div class="mb-3 mt-3">
                        <label for="name" class="form-label">Nama Lengkap<span class="required">*</span></label>
                        <input type="text" class="form-control @error('name') is-invalid @enderror" id="name"
                            name="name" required value="{{ old('name') }}">
                        @error('name')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                        @enderror
                    </div>

                    <div class="mb-3 mt-3">
                        <label for="jender" class="form-label">Jenis Kelamin<span class="required">*</span></label>
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="jender" id="jender1" value="laki - laki"
                                checked>
                            <label class="form-check-label" for="jender1">
                                Laki - Laki
                            </label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="jender" id="jender2" value="perempuan">
                            <label class="form-check-label" for="jender2">
                                Perempuan
                            </label>
                        </div>
                    </div>

                    <div class="mb-3 mt-3">
                        <label for="job" class="form-label">Pekerjaan<span class="required">*</span></label>
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="job" id="job1" value="pelajar/mahasiswa"
                                checked>
                            <label class="form-check-label" for="job1">
                                Pelajar/Mahasiswa
                            </label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="job" id="job2" value="pns">
                            <label class="form-check-label" for="job2">
                                PNS
                            </label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="job" id="job3" value="tni">
                            <label class="form-check-label" for="job3">
                                TNI
                            </label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="job" id="job4" value="polri">
                            <label class="form-check-label" for="job4">
                                POLRI
                            </label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="job" id="job5" value="bumn">
                            <label class="form-check-label" for="job5">
                                BUMN
                            </label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="job" id="job6" value="pegawai swasta">
                            <label class="form-check-label" for="job6">
                                Pegawai Swasta
                            </label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="job" id="job7" value="wiraswasta">
                            <label class="form-check-label" for="job7">
                                Wiraswasta
                            </label>
                        </div>
                    </div>

                    <div class="mb-3 mt-3">
                        <label for="email" class="form-label">Email<span class="required">*</span></label>
                        <input type="email" class="form-control @error('email') is-invalid @enderror" id="email"
                            name="email" required value="{{ old('email') }}">
                        @error('email')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                        @enderror
                    </div>

                    <hr class="mt-5 mb-5">
                    <h1>Pertanyaan Kuesioner</h1>

                    @foreach ($questions as $question)
                    <div class="mb-3 mt-3">
                        <label for="quiz" class="form-label"><strong>{{ $loop->iteration }}.
                            </strong>{{ $question->questions }}</label>
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="{{ $loop->iteration }}"
                                id="{{ $loop->iteration }}" value="Sangat Setuju">
                            <label class="form-check-label" for="{{ $loop->iteration }}">
                                Sangat Setuju
                            </label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="{{ $loop->iteration }}"
                                id="{{ $loop->iteration }}" value="Setuju">
                            <label class="form-check-label" for="{{ $loop->iteration }}">
                                Setuju
                            </label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="{{ $loop->iteration }}"
                                id="{{ $loop->iteration }}" value="Kurang Setuju">
                            <label class="form-check-label" for="{{ $loop->iteration }}">
                                Kurang Setuju
                            </label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="{{ $loop->iteration }}"
                                id="{{ $loop->iteration }}" value="Tidak Setuju">
                            <label class="form-check-label" for="{{ $loop->iteration }}">
                                Tidak Setuju
                            </label>
                        </div>
                    </div>
                    @endforeach

                    <div class="mb-3 mt-3">
                        <label for="comment" class="form-label">Tuliskan komentar/usulan Saudara terhadap kemajuan dan
                            pengembangan pelayanan kepuasan masyarakat</label>
                        <textarea class="form-control" id="comment" name="comment" rows="3"></textarea>
                    </div>

                    <button type="submit" class="btn btn-primary mb-4 mt-4">Kirim</button>
                </form>
            </div>
        </div>
    </div>
</div>

@endsection
