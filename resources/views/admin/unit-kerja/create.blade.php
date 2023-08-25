@extends('admin.layouts.main')

@section('content')
<div class="container-fluid">
    <h1 class="text-center">Buat Unit Kerja Baru</h1>
    <div class="row">
        <div class="col-lg-8">
            <form method="POST" action="/admin/unit-kerja" enctype="multipart/form-data">
                @csrf

                <div class="mb-3">
                    <label for="judul" class="form-label">Judul</label>
                    <input type="text" class="form-control @error('judul') is-invalid @enderror" id="judul" name="judul"
                        required value="{{ old('judul') }}">
                    @error('judul')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                    @enderror
                </div>
                
                <input type="hidden" class="form-control @error('slug') is-invalid @enderror" id="slug" name="slug"
                    required value="{{ old('slug') }}" readonly>

                {{-- <div class="mb-3">
                    <label for="slug" class="form-label">Slug</label>
                    <input type="text" class="form-control @error('slug') is-invalid @enderror" id="slug" name="slug"
                        required value="{{ old('slug') }}" readonly>
                    @error('slug')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                    @enderror
                </div> --}}
                
                <div class="mb-3">
                    <label for="lokasi" class="form-label">Lokasi</label>
                    <input type="text" class="form-control @error('lokasi') is-invalid @enderror" id="lokasi" name="lokasi"
                        required value="{{ old('lokasi') }}">
                    @error('lokasi')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                    @enderror
                </div>

                <div class="mb-3">
                    <label for="tugas_dan_fungsi" class="form-label">Tugas dan Fungsi</label>
                    @error('tugas_dan_fungsi')
                    <p class="text-danger">{{ $message }}</p>
                    @enderror
                    <input id="tugas_dan_fungsi" type="hidden" name="tugas_dan_fungsi" value="{{ old('tugas_dan_fungsi') }}">
                    <trix-editor input="tugas_dan_fungsi"></trix-editor>
                </div>
                
                <button type="submit" class="btn btn-primary mb-4">Buat</button>

            </form>
        </div>
    </div>
</div>

<script>
    const judul = document.querySelector('#judul');
    const slug = document.querySelector('#slug');

    judul.addEventListener('change', function () {
        fetch('/admin/unit-kerja/checkSlugUnit?judul=' + judul.value)
            .then(response => response.json())
            .then(data => slug.value = data.slug)
    });

</script>

@endsection
