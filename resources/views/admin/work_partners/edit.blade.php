@extends('admin.layouts.main')

@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-lg-8">
            <form method="POST" action="/admin/mitra-kerja/{{ $item->id }}" enctype="multipart/form-data">
                @csrf
                @method('put')

                <input type="hidden" name="id" id="id" value="{{ $item->id }}">

                <div class="mb-3">
                    <label for="title" class="form-label">Nama</label>
                    <input type="text" class="form-control @error('title') is-invalid @enderror" id="title" name="title"
                        autofocus required value="{{ old('title', $item->title) }}">
                    @error('title')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                    @enderror
                </div>
                <div class="mb-3">
                    <label for="image" class="form-label">Gambar</label>
                    <input type="hidden" name="oldImage" value="{{ $item->image }}">
                    @if ($item->image)
                        <img src="{{ asset('storage/' . $item->image) }}" class="img-preview img-fluid mb-3 col-sm-5 d-block">
                    @else
                        <img class="img-preview img-fluid mb-3 col-sm-5">
                    @endif
                        <input class="form-control" type="file" id="image" name="image" @error('image') is-invalid @enderror
                            onchange="previewImage()">
                    @error('image')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>

                <button type="submit" class="btn btn-primary mb-4">Simpan</button>
            </form>
        </div>
    </div>
</div>

<script>
    const title = document.querySelector('#title');
    const slug = document.querySelector('#slug');

    title.addEventListener('change', function () {
        fetch('/dashboard/posts/checkSlug?title=' + title.value)
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