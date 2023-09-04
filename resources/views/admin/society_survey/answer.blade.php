@extends('admin.layouts.main')

@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-lg-6">
            <form method="POST" action="/admin/survey-masyarakat/{{ ($answer->first()) ? 'update-jawaban/' . $answer->first()->id : 'jawaban' }}" enctype="multipart/form-data">
                
                <input type="hidden" id="question_id" name="question_id" value="{{ $item->id }}">
                
                <p>Pertanyaan : {{ $item->questions }}</p>
                <p>Jawaban</p>

                @if ($answer->first())
                    @method('put')
                @endif
                @csrf

                <div class="mb-3 d-flex align-items-center">
                    <label for="A" class="form-label me-2">A</label>
                    <input type="text" class="form-control @error('A') is-invalid @enderror" id="A"
                        name="A" value="{{ old('A', ($answer->first()) ? $answer->first()->A : '' ) }}">
                    @error('A')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                    @enderror
                </div>

                <div class="mb-3 d-flex align-items-center">
                    <label for="B" class="form-label me-2">B</label>
                    <input type="text" class="form-control @error('B') is-invalid @enderror" id="B"
                        name="B" value="{{ old('B', ($answer->first()) ? $answer->first()->B : '' ) }}">
                    @error('B')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                    @enderror
                </div>

                <div class="mb-3 d-flex align-items-center">
                    <label for="C" class="form-label me-2">C</label>
                    <input type="text" class="form-control @error('C') is-invalid @enderror" id="C"
                        name="C" value="{{ old('C', ($answer->first()) ? $answer->first()->C : '' ) }}">
                    @error('C')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                    @enderror
                </div>

                <div class="mb-3 d-flex align-items-center">
                    <label for="D" class="form-label me-2">D</label>
                    <input type="text" class="form-control @error('D') is-invalid @enderror" id="D"
                        name="D" value="{{ old('D', ($answer->first()) ? $answer->first()->D : '' ) }}">
                    @error('D')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                    @enderror
                </div>

                <div class="mb-3 d-flex align-items-center">
                    <label for="E" class="form-label me-2">E</label>
                    <input type="text" class="form-control @error('E') is-invalid @enderror" id="E"
                        name="E" value="{{ old('E', ($answer->first()) ? $answer->first()->E : '' ) }}">
                    @error('E')
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
