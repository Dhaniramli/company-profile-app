@extends('admin.layouts.main')

@section('content')
<div class="container-fluid">
    <h1 class="text-center">Buat Baru</h1>
    <div class="row">
        <div class="col-lg-8">
            <form method="POST" action="/admin/galeri" enctype="multipart/form-data">
                @csrf
                <div class="mb-3">
                    <label for="description" class="form-label">Deskripsi Unit Kerja</label>
                    <input type="text" class="form-control @error('description') is-invalid @enderror" id="description" name="description"
                        required value="{{ old('description') }}">
                    @error('description')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                    @enderror
                </div>
                
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
                
                <button type="submit" class="btn btn-primary mb-4">Buat</button>
            </form>
        </div>
    </div>
</div>

@endsection
