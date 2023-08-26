@extends('admin.layouts.main')

@section('content')
<div class="container-fluid">
    <h1 class="text-center">Denah Kantor</h1>
    @if (session()->has('success'))
    <div class="alert alert-success d-flex justify-content-center" role="alert" style="width: 200px;">
        {{ session('success') }}
    </div>
    @endif

    <div class="row">
        <div class="col-lg-8">
            <form method="POST" action="/admin/denah-kantor{{ ($office_plan->count() ? '/1' : '') }}" enctype="multipart/form-data">

                @if ($office_plan->count())
                @method('put')
                @endif

                @csrf
                <input type="hidden" id="id" name="id" value="1">
                <div class="mb-3">
                    <label for="image" class="form-label">Gambar</label>
                    <input type="hidden" name="oldImage" value="{{ ($office_plan->count() ? $office_plan[0]->image : '') }}">
                    @if ($office_plan->count())
                        <img src="{{ asset('storage/' . $office_plan[0]->image) }}" class="img-preview img-fluid mb-3 col-sm-5 d-block">
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