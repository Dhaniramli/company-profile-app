@extends('admin.layouts.main')

@section('content')

<div class="container-fluid">
    <h1 class="text-center">Visi Misi</h1>
    <div class="card shadow mb-4">
        <div class="card-body">
            <form method="POST" action="/admin/visi-misi{{ ($visi_misi->count() ? '/1' : '') }}"
                enctype="multipart/form-data">
                @csrf
                @if ($visi_misi->count())
                @method('put')
                @endif

                <input type="hidden" id="id" name="id" value="1">

                <div class="row">
               

                    <div class="col-lg-8">
                        <div class="mb-3">
                            <label for="title" class="form-label">Judul</label>
                            <input type="text" class="form-control @error('title') is-invalid @enderror" id="title"
                                name="title" required
                                value="{{ old('title',($visi_misi->count() ? $visi_misi[0]->title : '')) }}">
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
                            <input id="body" type="hidden" name="body"
                                value="{{ old('body', ($visi_misi->count() ? $visi_misi[0]->body : '')) }}">
                            <trix-editor input="body"></trix-editor>
                        </div>
                    </div>
                    
                    <div class="col-lg-4">
                        <div class="mb-3">
                            <label for="image" class="form-label">Gambar</label>
                            <input type="hidden" name="oldImage"
                                value="{{ ($visi_misi->count() ? $visi_misi[0]->image : '') }}">
                            @if ($visi_misi->count())
                            <img src="{{ asset('storage/' . $visi_misi[0]->image) }}"
                                class="img-preview img-fluid mb-3 col-sm-5 d-block">
                            @else
                            <img class="img-preview img-fluid mb-3 col-sm-5">
                            @endif
                            <input class="form-control" type="file" id="image" name="image" @error('image') is-invalid
                                @enderror onchange="previewImage()">
                            @error('image')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                            @enderror
                        </div>
                    </div>
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
