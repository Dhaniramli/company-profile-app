@extends('admin.layouts.main')

@section('content')
<div class="container-fluid">
    <h1>Buat Baru</h1>
    <div class="row">
        <div class="col-lg-8">
            <form method="POST" action="/admin/mitra-kerja" enctype="multipart/form-data">
                @csrf
                <div class="mb-3">
                    <label for="title" class="form-label">Nama</label>
                    <input type="text" class="form-control @error('title') is-invalid @enderror" id="title" name="title"
                        required value="{{ old('title') }}">
                    @error('title')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                    @enderror
                </div>
                <div class="mb-3">
                    <label for="image" class="form-label">Gambar</label>
                    <img class="img-preview img-fluid mb-3 col-sm-5">
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
