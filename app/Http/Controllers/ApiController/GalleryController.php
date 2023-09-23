<?php

namespace App\Http\Controllers\ApiController;

use App\Models\Galeri;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Resources\Gallery\GalleryResource;
use App\Http\Controllers\ApiController\BaseController;

class GalleryController extends Controller
{
    public function index()
    {
        $items = Galeri::all();

        if (!$items->count()) {
            // abort(code: 404, message: 'Tidak ada data!');
            return BaseController::jsonResponseSuccessError(false, 'Tidak ada data!');
        }

        return BaseController::jsonResponseSuccessError(true, 'Data berhasil ditemukan!', GalleryResource::collection($items));
    }
}
