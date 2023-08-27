@extends('admin.layouts.main')

@section('content')

<div class="container-fluid">
    <h1 class="text-center mb-5">Tugas dan Fungsi</h1>
    <div class="row">
        <div class="col-lg-8">
            <form method="POST" action="/admin/tugas-fungsi{{ ($job_function->count() ? '/1' : '') }}"
                enctype="multipart/form-data">
                @csrf
                
                @if ($job_function->count())
                @method('put')
                @endif

                <input type="hidden" id="id" name="id" value="1">
                
                <div class="mb-3">
                    @error('body')
                    <p class="text-danger">{{ $message }}</p>
                    @enderror
                    <input id="body" type="hidden" name="body"
                        value="{{ old('body', ($job_function->count() ? $job_function[0]->body : '')) }}">
                    <trix-editor input="body"></trix-editor>
                </div>

                <button type="submit" class="btn btn-primary mb-4">Simpan</button>
            </form>
        </div>
    </div>
</div>


@endsection
