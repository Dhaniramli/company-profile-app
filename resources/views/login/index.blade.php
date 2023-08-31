<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="/css/style_auth.css">
    
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">
    
    <title>Login</title>
</head>

<body>
    <div class="container content-auth">
        <div class="row justify-content-center">
            <div class="col-lg-5">
                <div class="card p-3">
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
                                <input type="email" name="email"
                                    class="form-control @error('email') is-invalid @enderror" id="email"
                                    placeholder="name@example.com" autofocus required value="{{ old('email') }}">
                                @error('email')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                                @enderror
                                <label for="email">Email address</label>
                            </div>
                            <div class="form-floating">
                                <input type="password" name="password" class="form-control" id="password"
                                    placeholder="Password" required>
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
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-HwwvtgBNo3bZJJLYd8oVXjrBZt8cqVSpeBNS5n7C8IVInixGAoxmnlMuBnhbgrkm" crossorigin="anonymous">
    </script>
</body>

</html>
