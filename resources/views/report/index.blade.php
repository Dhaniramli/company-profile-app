@extends('layouts.main')

@section('content')
<div class="container content-pengaduan">
    <div class="title-pengaduan d-flex justify-content-center mb-5">
        <h1>Layanan Masyarakat</h1>
    </div>
    <div class="container isi-pengaduan">
        <div class="col-lg-12">
            <div class="row d-flex justify-content-center">
                <div class="col-md-4 mb-3">
                    <a href="/pengaduan/create">
                        <div class="card card-pengaduan">
                            <div class="card-top">
                                <img src="img/icon2.png" alt="Gambar">
                            </div>
                            <div class="card-bottom">
                                <h2 class="card-jabatan">Kirim Pengaduan</h2>
                            </div>
                        </div>
                    </a>
                </div>
                <div class="col-md-4 mb-3">
                    <a href="/pengaduan-status">
                        <div class="card card-pengaduan">
                            <div class="card-top">
                                <img src="img/icon1.png" alt="Gambar">
                            </div>
                            <div class="card-bottom">
                                <h2 class="card-jabatan">Status Pengaduan</h2>
                            </div>
                        </div>
                    </a>
                </div>
                <div class="col-md-4 mb-3">
                    <a href="https://wa.me/">
                        <div class="card card-pengaduan">
                            <div class="card-top">
                                <img src="img/icon3.png" alt="Gambar">
                            </div>
                            <div class="card-bottom">
                                <h2 class="card-jabatan">Costumer Service</h2>
                            </div>
                        </div>
                    </a>
                </div>


            </div>
        </div>
    </div>
</div>

@endsection
