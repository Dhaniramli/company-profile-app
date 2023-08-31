<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="/css/style_auth.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">
    
    <title>Register</title>
</head>

<body>
    <div class="container content-auth">
        <div class="row justify-content-center">
            <div class="col-lg-6">
                <div class="card p-3">
                    <main class="form-registration w-100 m-auto">
                        <form action="/register" method="POST">
                            @csrf
                            <h1 class="h3 mb-3 fw-normal">Form Registrasi</h1>

                            <div class="form-floating">
                                <input type="text" name="name"
                                    class="form-control rounded-top @error('name') is-invalid @enderror" id="name"
                                    placeholder="Name" required value="{{ old('name') }}">
                                @error('name')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                                @enderror
                                <label for="name">Nama</label>
                            </div>

                            <div class="form-floating">
                                <input type="email" name="email"
                                    class="form-control @error('email') is-invalid @enderror" id="email"
                                    placeholder="name@example.com" required value="{{ old('email') }}">
                                @error('email')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                                @enderror
                                <label for="email">Email</label>
                            </div>

                            <div class="form-floating">
                                <input type="password" name="password"
                                    class="form-control rounded-bottom @error('password') is-invalid @enderror"
                                    id="floatingPassword" placeholder="Password" required>
                                @error('password')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                                @enderror
                                <label for="floatingPassword">Password</label>
                            </div>
                            <button class="btn btn-primary w-100 py-2 mt-3" type="submit">Register</button>
                        </form>
                        <small class="d-block text-center mt-3">Sudah punya akun? <a href="/login"
                                class="text-decoration-none">Login</a></small>
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
