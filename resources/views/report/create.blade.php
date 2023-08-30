@extends('layouts.main')

@section('content')
<div class="container content-create-report">
    <h1>Silahkan Input Aduan Anda</h1>
    @if (session()->has('success'))
    <div class="alert alert-success" role="alert">
        {{ session('success') }}
    </div>
    @endif
    <div class="row">
        <div class="col-lg-12">
            <div class="card card-create-report">
                <form method="POST" action="/pengaduan/create" enctype="multipart/form-data">
                    @csrf
                    <div class="mb-3 mt-3">
                        <label for="nik" class="form-label">NIK<span class="required">*</span></label>
                        <input type="number" class="form-control @error('nik') is-invalid @enderror" id="nik" name="nik"
                            required value="{{ old('nik') }}">
                        @error('nik')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                        @enderror
                    </div>

                    <div class="mb-3 mt-3">
                        <label for="name" class="form-label">Nama<span class="required">*</span></label>
                        <input type="text" class="form-control @error('name') is-invalid @enderror" id="name"
                            name="name" required value="{{ old('name') }}">
                        @error('name')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                        @enderror
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

                    <div class="mb-3 mt-3">
                        <label for="phone_number" class="form-label">No HP<span class="required">*</span></label>
                        <input type="number" class="form-control @error('phone_number') is-invalid @enderror"
                            id="phone_number" name="phone_number" required value="{{ old('phone_number') }}">
                        @error('phone_number')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                        @enderror
                    </div>

                    <div class="mb-3 mt-3">
                        <label for="title_report" class="form-label">Judul Pengaduan<span
                                class="required">*</span></label>
                        <input type="text" class="form-control @error('title_report') is-invalid @enderror"
                            id="title_report" name="title_report" required value="{{ old('title_report') }}">
                        @error('title_report')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                        @enderror
                    </div>

                    <div class="mb-3 mt-3">
                        <label for="report" class="form-label">Pengaduan<span class="required">*</span></label>
                        @error('report')
                        <p class="text-danger">{{ $message }}</p>
                        @enderror
                        <input id="report" type="hidden" name="report" value="{{ old('report') }}">
                        <trix-editor input="report"></trix-editor>
                    </div>

                    {{-- <input type="hidden" class="form-control @error('slug') is-invalid @enderror" id="slug" name="slug"
                        required value="{{ old('slug') }}" readonly> --}}

                    <div class="mb-3 mt-3">
                        <label for="image_report" class="form-label">Foto Aduan Anda<span
                                class="required">*</span></label>
                        <img class="img-preview img-fluid mb-3 col-sm-5">
                        <input class="form-control" type="file" id="image_report" name="image_report"
                            @error('image_report') is-invalid @enderror onchange="previewImage()">
                        @error('image_report')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                        @enderror
                    </div>

                    <div class="mb-3 mt-3">
                        <label for="image_ktp" class="form-label">Foto Aduan Anda<span class="required">*</span></label>
                        <img class="img-preview img-fluid mb-3 col-sm-5">
                        <input class="form-control" type="file" id="image_ktp" name="image_ktp" @error('image_ktp')
                            is-invalid @enderror onchange="previewImage()">
                        @error('image_ktp')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                        @enderror
                    </div>

                    <button type="submit" class="btn btn-primary mb-4 mt-4">Kirim</button>
                </form>
            </div>
        </div>
    </div>
</div>

@endsection
