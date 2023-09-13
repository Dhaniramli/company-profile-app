<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ApiController\NewsController;
use App\Http\Controllers\ApiController\GalleryController;
use App\Http\Controllers\ApiController\WorkUnitController;
use App\Http\Controllers\ApiController\OfficePlanController;
use App\Http\Controllers\ApiController\JobFunctionController;
use App\Http\Controllers\ApiController\AuthenticateController;
use App\Http\Controllers\ApiController\WorkPartnersController;
use App\Http\Controllers\ApiController\VissionMissionController;
use App\Http\Controllers\ApiController\PositionAddressController;
use App\Http\Controllers\ApiController\StructuralOfficialController;
use App\Http\Controllers\ApiController\DocumentsPublicationsController;
use App\Http\Controllers\ApiController\FormSurveyController;
use App\Http\Controllers\ApiController\OrganizationalStructureController;
use App\Http\Controllers\ApiController\ReportController;

Route::middleware(['auth:sanctum'])->group(function () {
    Route::post('/pengaduan', [ReportController::class, 'store']);
    Route::get('/pengaduan', [ReportController::class, 'index']);
    Route::get('/form-survey/kuesioner', [FormSurveyController::class, 'kuesioner']);
    Route::post('/form-survey/penunjang-urusan-pemerintahan-umum', [FormSurveyController::class, 'store']);

    Route::get('/logout', [AuthenticateController::class, 'logout']);
});

Route::get('/visi-misi', [VissionMissionController::class, 'index']);
Route::get('/tugas-fungsi', [JobFunctionController::class, 'index']);
Route::get('/kedudukan', [PositionAddressController::class, 'index']);
Route::get('/struktur-organisasi', [OrganizationalStructureController::class, 'index']);
Route::get('/denah-kantor', [OfficePlanController::class, 'index']);
Route::get('/pejabat-struktural', [StructuralOfficialController::class, 'index']);
Route::get('/unit-kerja', [WorkUnitController::class, 'index']);
Route::get('/unit-kerja/{id}', [WorkUnitController::class, 'show']);
Route::get('/news', [NewsController::class, 'index']);
Route::get('/news/{id}', [NewsController::class, 'show']);
Route::get('/galeri-kegiatan', [GalleryController::class, 'index']);
Route::get('/sakip', [DocumentsPublicationsController::class, 'index']);
Route::get('/sakip/download/{id}', [DocumentsPublicationsController::class, 'download']);
Route::get('/mitra-kerja', [WorkPartnersController::class, 'index']);

Route::post('/login', [AuthenticateController::class, 'login']);
Route::post('/register', [AuthenticateController::class, 'register']);
