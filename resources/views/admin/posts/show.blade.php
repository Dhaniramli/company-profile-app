@extends('admin.layouts.main')

@section('content')

<div class="container">
    <div class="row my-3">
        <div class="col-lg-8">
            <h2 class="mb-3">{{ $post->title }}</h2>
            <a href="/admin/posts" class="btn btn-success"><i class="fa fa-arrow-left" aria-hidden="true"></i> Kembali</a>
            <a href="/admin/posts/{{ $post->slug }}/edit" class="btn btn-warning"><i class="fa fa-keyboard"
                    aria-hidden="true"></i> Edit</a>
                    
            <form action="/admin/posts/{{ $post->slug }}" method="POST" class="d-inline">
                @method('delete')
                @csrf
                <button class="btn btn-danger" onclick="return confirm('Are you sure?')"><i class="fa fa-trash"
                        aria-hidden="true"></i> Hapus</button>
            </form>

            @if ($post->image)
            <div class="" style="max-height: 350px; overflow:hidden;">
                <img src="{{ asset('storage/' . $post->image) }}" alt="" class="img-fluid mt-3">
            </div>
            @else
            <img src="https://source.unsplash.com/1200x400?personal"
                alt="" class="img-fluid mt-3">
            @endif

            <article class="my-3 fs-5">
                {!! $post->body !!}
            </article>

        </div>
    </div>
</div>

@endsection
