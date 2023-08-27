@extends('admin.layouts.main')

@section('content')

<div class="container-fluid">
    <h1 class="text-center mb-5">Kedudukan dan Alamat</h1>
    <div class="row">
        <div class="col-lg-8">
            <form method="POST" action="/admin/kedudukan-alamat{{ ($position_address->count() ? '/1' : '') }}"
                enctype="multipart/form-data">
                @csrf
                
                @if ($position_address->count())
                @method('put')
                @endif

                <input type="hidden" id="id" name="id" value="1">
                
                <div class="mb-3">
                    @error('body')
                    <p class="text-danger">{{ $message }}</p>
                    @enderror
                    <input id="body" type="hidden" name="body"
                        value="{{ old('body', ($position_address->count() ? $position_address[0]->body : '')) }}">
                    <trix-editor input="body"></trix-editor>
                </div>

                <button type="submit" class="btn btn-primary mb-4">Simpan</button>
            </form>
        </div>
    </div>
</div>


@endsection
