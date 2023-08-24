<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\NewsController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\GalerisController;
use App\Http\Controllers\VisiMisiController;
use App\Http\Controllers\AdminPostController;
use App\Http\Controllers\AdminGaleriController;
use App\Http\Controllers\AdminVisiMisiController;
use App\Http\Controllers\AdminUnitKerjaController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', [HomeController::class, 'index']);

Route::get('/news', [NewsController::class, 'index']);

Route::get('/visi-misi', [VisiMisiController::class, 'index']);

Route::get('/tugas-fungsi', function(){
    return view('tugas_fungsi',[
        'active' => 'tugas-fungsi',
    ]);
});

Route::get('/kedudukan', function(){
    return view('kedudukan',[
        'active' => 'kedudukan',
    ]);
});

Route::get('/struktur-organisasi', function(){
    return view('struktur_organisasi',[
        'active' => 'struktur-organisasi',
    ]);
});

Route::get('/denah-kantor', function(){
    return view('denah_kantor',[
        'active' => 'denah-kantor',
    ]);
});

Route::get('/pejabat-struktural', function(){
    return view('pejabat_struktural',[
        'active' => 'pejabat-struktural',
    ]);
});

Route::get('/unit-kerja', function(){
    return view('unit_kerja',[
        'active' => 'unit-kerja',
    ]);
});

Route::get('/galeri-kegiatan', [GalerisController::class, 'index']);

Route::get('/pengaduan', function(){
    return view('pengaduan',[
        'active' => 'pengaduan',
    ]);
});

Route::get('/mitra-kerja', function(){
    return view('mitra_kerja',[
        'active' => 'mitra-kerja',
    ]);
});

Route::get('/posts', [PostController::class, 'index']);
Route::get('/news/{post}', [PostController::class, 'show']);

Route::get('/admin', function () {
    return view('admin.index');
});

// Route::get('/admin/visi-misi', function () {
//     return view('admin.visi-misi.index');
// });

Route::resource('/admin/visi-misi', AdminVisiMisiController::class);

Route::get('/admin/posts/checkSlug', [AdminPostController::class, 'checkSlug']);
Route::resource('/admin/posts', AdminPostController::class);

Route::resource('/admin/galeri', AdminGaleriController::class);

Route::resource('/admin/unit-kerja', AdminUnitKerjaController::class);

