@extends('layouts.main')

@section('content')
<div class="container content-survey">
    <div class="title-survey d-flex justify-content-center mb-5">
        <h1>Silahkan Pilih Bidang Terlebih Dahulu</h1>
    </div>
    <div class="container isi-survey">
        <div class="col-lg-12">
            <div class="row d-flex justify-content-center">
                <div class="col-lg-3 mb-3">
                    <a href="/form-survey/penunjang-urusan-pemerintahan-umum">
                        <div class="card card-survey">
                            <div class="card-top">
                                <img src="img/icon1.png" alt="Gambar">
                            </div>
                            <div class="card-bottom">
                                <h2 class="card-jabatan">Lorem ipsum dolor sit amet.</h2>
                            </div>
                        </div>
                    </a>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
