@extends('admin.layouts.main')

@section('content')

<!-- Begin Page Content -->
<div class="container-fluid">
    <h1 class="h3 mb-2 text-gray-800 text-center">Visi Misi</h1>
    <div class="row">
        <div class="col-lg-8">
            <form action="GET">
                @csrf

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
                        readonly required value="{{ (count($dataVisiMisi) > 0) ? $dataVisiMisi[0]->title : '' }}">
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
                    <input readonly id="body" type="hidden" name="body"
                        value="{{ (count($dataVisiMisi) > 0) ? $dataVisiMisi[0]->body : '' }}">
                    <trix-editor input="body" contenteditable="false"></trix-editor>
                </div>

            </form>
            <a href="{{ count($dataVisiMisi) > 0 ? '/admin/visi-misi/1/edit' : '/admin/visi-misi/create'}}"
                class=" btn btn-primary mb-4">Edit</a>
            {{-- <button href class="btn btn-primary mb-4">Edit</button> --}}
        </div>
    </div>
</div>
<!-- /.container-fluid -->

<script>

</script>

@endsection
