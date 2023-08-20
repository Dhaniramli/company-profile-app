<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminPostController;
use App\Http\Controllers\HomeController;

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

Route::get('/', function () {
    return view('home', [HomeController::class, 'index']);
});

Route::get('/posts', [PostController::class, 'index']);

Route::get('/admin', function () {
    return view('admin.index');
});

Route::resource('/admin/posts', AdminPostController::class);