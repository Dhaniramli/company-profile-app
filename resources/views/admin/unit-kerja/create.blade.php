@extends('admin.layouts.main')

@section('content')
<div class="container-fluid">
    <h1 class="text-center">Buat Unit Kerja Baru</h1>
    <div class="row">
        <div class="col-lg-8">
            <form method="POST" action="/admin/unit-kerja" enctype="multipart/form-data">
                @csrf

                <div class="mb-3">
                    <label for="title" class="form-label">Judul</label>
                    <input type="text" class="form-control @error('title') is-invalid @enderror" id="title" name="title"
                        required value="{{ old('title') }}">
                    @error('title')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                    @enderror
                </div>
                
                <input type="hidden" class="form-control @error('slug') is-invalid @enderror" id="slug" name="slug"
                    required value="{{ old('slug') }}" readonly>

                <div class="mb-3">
                    <label for="location" class="form-label">Lokasi</label>
                    <input type="text" class="form-control @error('location') is-invalid @enderror" id="location" name="location"
                        required value="{{ old('location') }}">
                    @error('location')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                    @enderror
                </div>

                <div class="mb-3">
                    <label for="job_function" class="form-label">Tugas dan Fungsi</label>
                    @error('job_function')
                    <p class="text-danger">{{ $message }}</p>
                    @enderror
                    <input id="job_function" type="hidden" name="job_function" value="{{ old('job_function') }}">
                    <trix-editor input="job_function"></trix-editor>
                </div>
                
                <button type="submit" class="btn btn-primary mb-4">Buat</button>

            </form>
        </div>
    </div>
</div>

<script>
    const title = document.querySelector('#title');
    const slug = document.querySelector('#slug');

    title.addEventListener('change', function () {
        fetch('/admin/unit-kerja/checkSlugUnit?title=' + title.value)
            .then(response => response.json())
            .then(data => slug.value = data.slug)
    });
</script>

@endsection
