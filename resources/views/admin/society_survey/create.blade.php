@extends('admin.layouts.main')

@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-lg-8">
            <form method="POST" action="/admin/survey-masyarakat" enctype="multipart/form-data">
                @csrf
                <div class="mb-3">
                    <label for="questions" class="form-label">Pertanyaan</label>
                    <input type="text" class="form-control @error('questions') is-invalid @enderror" id="questions" name="questions"
                        required value="{{ old('questions') }}">
                    @error('questions')
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

@endsection
