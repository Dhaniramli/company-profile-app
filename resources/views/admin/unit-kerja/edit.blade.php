@extends('admin.layouts.main')

@section('content')
<div class="container-fluid">
    <h1>Edit Unit Kerja</h1>
    <div class="row">
        <div class="col-lg-8">
            <form method="POST" action="/admin/unit-kerja/{{ $unitKerja->slug }}" enctype="multipart/form-data">
                @csrf
                @method('put')

                <div class="mb-3">
                    <label for="title" class="form-label">Judul</label>
                    <input type="text" class="form-control @error('title') is-invalid @enderror" id="title" name="title"
                        required value="{{ old('title', $unitKerja->title) }}">
                    @error('title')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                    @enderror
                </div>

                <input type="hidden" class="form-control @error('slug') is-invalid @enderror" id="slug" name="slug"
                required value="{{ old('slug', $unitKerja->slug) }}">
                {{-- <div class="mb-3">
                    <label for="slug" class="form-label">Slug</label>
                    <input type="text" class="form-control @error('slug') is-invalid @enderror" id="slug" name="slug"
                        required value="{{ old('slug', $post->slug) }}">
                    @error('slug')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                    @enderror
                </div> --}}

                <div class="mb-3">
                    <label for="location" class="form-label">Lokasi</label>
                    <input type="text" class="form-control @error('location') is-invalid @enderror" id="location"
                        name="location" required value="{{ old('location', $unitKerja->location) }}">
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
                    <input id="job_function" type="hidden" name="job_function"
                        value="{{ old('job_function', $unitKerja->job_function) }}">
                    <trix-editor input="job_function"></trix-editor>
                </div>

                <button type="submit" class="btn btn-primary mb-4">Simpan</button>
            </form>
        </div>
    </div>
</div>

<script>
    const lokasi = document.querySelector('#lokasi');
    const slug = document.querySelector('#slug');

    lokasi.addEventListener('change', function () {
        fetch('/dashboard/posts/checkSlug?lokasi=' + lokasi.value)
            .then(response => response.json())
            .then(data => slug.value = data.slug)
    });

    document.addEventListener('trix-file-accept', function () {
        e.preventDefault();
    })

    function previewImage() {
        const image = document.querySelector('#image');
        const imgPreview = document.querySelector('.img-preview');

        imgPreview.style.display = 'block';

        const oFReader = new FileReader();
        oFReader.readAsDataURL(image.files[0]);

        oFReader.onload = function (oFREvent) {
            imgPreview.src = oFREvent.target.result;
        }
    }

</script>
@endsection
