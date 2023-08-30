<?php

use App\Models\UnitKerja;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\NewsController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\ReportController;
use App\Http\Controllers\GalerisController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\VisiMisiController;
use App\Http\Controllers\AdminPostController;
use App\Http\Controllers\UnitKerjaController;
use App\Http\Controllers\FormSurveyController;
use App\Http\Controllers\OfficePlanController;
use App\Http\Controllers\AdminGaleriController;
use App\Http\Controllers\JobFunctionController;
use App\Http\Controllers\WorkPartnersController;
use App\Http\Controllers\AdminVisiMisiController;
use App\Http\Controllers\AdminUnitKerjaController;
use App\Http\Controllers\AdminOfficePlanController;
use App\Http\Controllers\PositionAddressController;
use App\Http\Controllers\AdminJobFunctionController;
use App\Http\Controllers\PejabatStrukturalController;
use App\Http\Controllers\AdminPositionAddressController;
use App\Http\Controllers\DocumentsPublicationsController;
use App\Http\Controllers\AdminPejabatStrukturalController;
use App\Http\Controllers\OrganizationalStructureController;
use App\Http\Controllers\AdminOrganizationalStructureController;

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

Route::get('/tugas-fungsi', [JobFunctionController::class, 'index']);

Route::get('/kedudukan', [PositionAddressController::class, 'index']);

Route::get('/struktur-organisasi', [OrganizationalStructureController::class, 'index']);

Route::get('/denah-kantor', [OfficePlanController::class, 'index']);

Route::get('/pejabat-struktural', [PejabatStrukturalController::class, 'index']);

Route::get('/unit-kerja', [UnitKerjaController::class, 'index']);
Route::get('/unit-kerja/{unitKerja}', [UnitKerjaController::class, 'show']);

Route::get('/galeri-kegiatan', [GalerisController::class, 'index']);

Route::get('/pengaduan', function(){
    return view('pengaduan',[
        'active' => 'pengaduan',
    ]);
})->middleware('auth');

Route::get('/pengaduan/create', [ReportController::class, 'index'])->middleware('auth');
Route::post('/pengaduan/create', [ReportController::class, 'store'])->middleware('auth');
Route::get('/pengaduan-status', [ReportController::class, 'show'])->middleware('auth');

Route::get('/form-survey', [FormSurveyController::class, 'index'])->middleware('auth');

Route::get('/sakip', [DocumentsPublicationsController::class, 'index']);

Route::get('/mitra-kerja', [WorkPartnersController::class, 'index']);

// Route::get('/posts', [PostController::class, 'index']);
Route::get('/news/{post}', [PostController::class, 'show']);

Route::get('/admin', [AdminController::class, 'index'])->middleware('admin');

Route::resource('/admin/visi-misi', AdminVisiMisiController::class)->middleware('admin');

Route::get('/admin/posts/checkSlug', [AdminPostController::class, 'checkSlug'])->middleware('admin');
Route::resource('/admin/posts', AdminPostController::class)->middleware('admin');

Route::resource('/admin/galeri', AdminGaleriController::class)->middleware('admin');

Route::get('/admin/unit-kerja/checkSlugUnit', [AdminUnitKerjaController::class, 'checkSlugUnit'])->middleware('admin');
Route::resource('/admin/unit-kerja', AdminUnitKerjaController::class)->middleware('admin');

Route::resource('/admin/pejabat-struktural', AdminPejabatStrukturalController::class)->middleware('admin');

Route::resource('/admin/denah-kantor', AdminOfficePlanController::class)->middleware('admin');

Route::resource('/admin/struktur-organisasi', AdminOrganizationalStructureController::class)->middleware('admin');

Route::resource('/admin/tugas-fungsi', AdminJobFunctionController::class)->middleware('admin');

Route::resource('/admin/kedudukan-alamat', AdminPositionAddressController::class)->middleware('admin');

Route::get('/login', [LoginController::class, 'index'])->name('login')->middleware('guest');
Route::post('/login', [LoginController::class, 'authenticate']);
Route::post('/logout', [LoginController::class, 'logout']);

Route::get('/register', [RegisterController::class, 'index'])->middleware('guest');
Route::post('/register', [RegisterController::class, 'store']);