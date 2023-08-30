@extends('layouts.main')

@section('content')
<div class="container content-auth">
    <div class="row justify-content-center">
        <div class="col-lg-4">
            <main class="form-signin w-100 m-auto">
                <form action="/login" method="POST">
                    @csrf

                    <h1 class="h3 mb-3 fw-normal">Silahkan Login</h1>
                    @if (session()->has('success'))
                    <div class="alert alert-success" role="alert" style="text-align: center;">
                        {{ session('success') }}
                    </div>
                    @endif

                    @if (session()->has('loginError'))
                    <div class="alert alert-danger" role="alert" style="text-align: center;">
                        {{ session('loginError') }}
                    </div>
                    @endif

                    <div class="form-floating">
                        <input type="email" name="email" class="form-control @error('email') is-invalid @enderror" id="email" placeholder="name@example.com" autofocus required value="{{ old('email') }}">
                        @error('email')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                        @enderror
                        <label for="email">Email address</label>
                    </div>
                    <div class="form-floating">
                        <input type="password" name="password" class="form-control" id="password" placeholder="Password" required>
                        <label for="password">Password</label>
                    </div>
                    <button class="btn btn-primary w-100 py-2" type="submit">Login</button>
                </form>
                <small class="d-block text-center mt-3">Belum punya akun? <a href="/register"
                        class="text-decoration-none">Register</a></small>
            </main>
        </div>
    </div>
</div>
@endsection
