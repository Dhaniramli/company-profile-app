<?php

namespace App\Http\Controllers\ApiController;

use App\Http\Controllers\Controller;
use App\Http\Resources\Gallery\GalleryResource;
use App\Models\Galeri;
use Illuminate\Http\Request;

class GalleryController extends Controller
{
    public function index(){
        $items = Galeri::all();

        if (!$items->count()) {
            abort(code: 404, message: 'Tidak ada data!');
        }

        return GalleryResource::collection($items);
    }
}
