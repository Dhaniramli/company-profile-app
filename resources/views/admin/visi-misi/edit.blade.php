@extends('admin.layouts.main')

@section('content')

<!-- Begin Page Content -->
<div class="container-fluid">
    <h1 class="h3 mb-2 text-gray-800 text-center">Visi Misi</h1>
    <div class="row">
        <div class="col-lg-8">
            <form method="POST" action="/admin/visi-misi">
                @csrf
                @method('put')
                
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

                <div class="mb-3">
                    <label for="body" class="form-label">Visi Misi</label>
                    @error('body')
                    <p class="text-danger">{{ $message }}</p>
                    @enderror
                    <input id="body" type="hidden" name="body" value="{{ old('body') }}">
                    <trix-editor input="body"></trix-editor>
                </div>

                <button type="submit" class="btn btn-primary mb-4">Simpan</button>
            </form>
        </div>
    </div>
</div>
<!-- /.container-fluid -->

<script>
    document.addEventListener('trix-file-accept', function () {
        e.preventDefault();
    })

</script>

@endsection
