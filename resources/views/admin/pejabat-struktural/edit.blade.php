@extends('admin.layouts.main')

@section('content')
<div class="container-fluid">
    <h1 class="text-center">Tambah Pejabat</h1>
    <div class="row">
        <div class="col-lg-8">
            <form method="POST" action="/admin/pejabat-struktural/{{ $pejabat->id }}" enctype="multipart/form-data">
                @csrf
                @method('put')

                <div class="mb-3">
                    <label for="nama" class="form-label">Nama Lengkap</label>
                    <input type="text" class="form-control @error('nama') is-invalid @enderror" id="nama" name="nama"
                        required value="{{ old('nama', $pejabat->nama) }}">
                    @error('nama')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                    @enderror
                </div>
                
                <div class="mb-3">
                    <label for="jabatan" class="form-label">Jabatan</label>
                    <input type="text" class="form-control @error('jabatan') is-invalid @enderror" id="jabatan" name="jabatan"
                        required value="{{ old('jabatan', $pejabat->jabatan) }}">
                    @error('jabatan')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                    @enderror
                </div>

                <div class="mb-3">
                    <label for="nomor" class="form-label">Nomor</label>
                    <input type="text" class="form-control @error('nomor') is-invalid @enderror" id="nomor" name="nomor"
                        required value="{{ old('nomor', $pejabat->nomor) }}">
                    @error('nomor')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                    @enderror
                </div>

                <div class="mb-3">
                    <label for="gambar" class="form-label">Gambar</label>
                    <input type="hidden" name="oldImage" value="{{ $pejabat->gambar }}">
                    @if ($pejabat->gambar)
                        <img src="{{ asset('storage/' . $pejabat->gambar) }}" class="img-preview img-fluid mb-3 col-sm-5 d-block">
                    @else
                        <img class="img-preview img-fluid mb-3 col-sm-5">
                    @endif
                        <input class="form-control" type="file" id="gambar" name="gambar" @error('gambar') is-invalid @enderror
                            onchange="previewImage()">
                    @error('gambar')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>

                
                <button type="submit" class="btn btn-primary mb-4">Buat</button>

            </form>
        </div>
    </div>
</div>

<script>

    function previewImage() {
        const gambar = document.querySelector('#gambar');
        const imgPreview = document.querySelector('.img-preview');

        imgPreview.style.display = 'block';

        const oFReader = new FileReader();
        oFReader.readAsDataURL(gambar.files[0]);

        oFReader.onload = function (oFREvent) {
            imgPreview.src = oFREvent.target.result;
        }
    }

</script>

@endsection
