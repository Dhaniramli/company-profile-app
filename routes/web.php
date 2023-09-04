<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\NewsController;
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
use App\Http\Controllers\AdminReportController;
use App\Http\Controllers\JobFunctionController;
use App\Http\Controllers\WorkPartnersController;
use App\Http\Controllers\AdminVisiMisiController;
use App\Http\Controllers\AdminUnitKerjaController;
use App\Http\Controllers\AdminOfficePlanController;
use App\Http\Controllers\PositionAddressController;
use App\Http\Controllers\AdminJobFunctionController;
use App\Http\Controllers\AdminWorkPartnersController;
use App\Http\Controllers\PejabatStrukturalController;
use App\Http\Controllers\AdminSocietySurveyController;
use App\Http\Controllers\AdminPositionAddressController;
use App\Http\Controllers\DocumentsPublicationsController;
use App\Http\Controllers\AdminPejabatStrukturalController;
use App\Http\Controllers\OrganizationalStructureController;
use App\Http\Controllers\AdminDocumentsPublicationsController;
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
Route::get('/news/{post}', [NewsController::class, 'show']);

Route::get('/visi-misi', [VisiMisiController::class, 'index']);

Route::get('/tugas-fungsi', [JobFunctionController::class, 'index']);

Route::get('/kedudukan', [PositionAddressController::class, 'index']);

Route::get('/struktur-organisasi', [OrganizationalStructureController::class, 'index']);

Route::get('/denah-kantor', [OfficePlanController::class, 'index']);

Route::get('/pejabat-struktural', [PejabatStrukturalController::class, 'index']);

Route::get('/unit-kerja', [UnitKerjaController::class, 'index']);
Route::get('/unit-kerja/{unitKerja}', [UnitKerjaController::class, 'show']);

Route::get('/galeri-kegiatan', [GalerisController::class, 'index']);

Route::middleware(['auth'])->group(function(){
    Route::get('/pengaduan', [ReportController::class, 'index']);
    Route::get('/pengaduan/create', [ReportController::class, 'create']);
    Route::post('/pengaduan/create', [ReportController::class, 'store']);
    Route::get('/pengaduan-status', [ReportController::class, 'show']);
    Route::get('/form-survey', [FormSurveyController::class, 'index']);
    Route::get('/form-survey/penunjang-urusan-pemerintahan-umum', [FormSurveyController::class, 'create']);
});


Route::get('/sakip', [DocumentsPublicationsController::class, 'index']);

Route::get('/mitra-kerja', [WorkPartnersController::class, 'index']);

Route::middleware(['admin'])->group(function(){
    Route::get('/admin', [AdminController::class, 'index']);
    Route::resource('/admin/visi-misi', AdminVisiMisiController::class);
    Route::get('/admin/posts/checkSlug', [AdminPostController::class, 'checkSlug']);
    Route::resource('/admin/posts', AdminPostController::class);
    Route::resource('/admin/galeri', AdminGaleriController::class);
    Route::get('/admin/unit-kerja/checkSlugUnit', [AdminUnitKerjaController::class, 'checkSlugUnit']);
    Route::resource('/admin/unit-kerja', AdminUnitKerjaController::class);
    Route::resource('/admin/pejabat-struktural', AdminPejabatStrukturalController::class);
    Route::resource('/admin/denah-kantor', AdminOfficePlanController::class);
    Route::resource('/admin/struktur-organisasi', AdminOrganizationalStructureController::class);
    Route::resource('/admin/tugas-fungsi', AdminJobFunctionController::class);
    Route::resource('/admin/kedudukan-alamat', AdminPositionAddressController::class);
    Route::resource('/admin/survey-masyarakat', AdminSocietySurveyController::class);
    Route::resource('/admin/pengaduan-masyarakat', AdminReportController::class);
    Route::get('/survey/verifikasi/{id}', [AdminReportController::class, 'report_verification']);
    Route::get('/survey/hapus/{id}', [AdminReportController::class, 'destroy']);
    Route::get('/admin/pengaduan-masyarakat/detail/{id}', [AdminReportController::class, 'show']);
    Route::resource('/admin/dokumen-publikasi', AdminDocumentsPublicationsController::class);
    Route::get('/file/download/{id}', [AdminDocumentsPublicationsController::class, 'download']);
    Route::get('/dokumen-publikasi/hapus/{id}', [AdminDocumentsPublicationsController::class, 'destroy']);
    Route::resource('/admin/mitra-kerja', AdminWorkPartnersController::class);
    Route::get('/mitra-kerja/hapus/{id}', [AdminWorkPartnersController::class, 'destroy']);
    Route::get('/admin/survey-masyarakat/jawaban/{id}', [AdminSocietySurveyController::class, 'answer']);
    Route::post('/admin/survey-masyarakat/jawaban', [AdminSocietySurveyController::class, 'store_answer']);
    Route::put('/admin/survey-masyarakat/update-jawaban/{id}', [AdminSocietySurveyController::class, 'update_jawaban']);
});


Route::get('/login', [LoginController::class, 'index'])->name('login')->middleware('guest');
Route::post('/login', [LoginController::class, 'authenticate']);
Route::post('/logout', [LoginController::class, 'logout']);

Route::get('/register', [RegisterController::class, 'index'])->middleware('guest');
Route::post('/register', [RegisterController::class, 'store']);