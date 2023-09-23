<?php

namespace App\Http\Controllers\ApiController;

use App\Models\Post;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Resources\News\NewsDetailResource;
use App\Http\Controllers\ApiController\BaseController;
use App\Http\Resources\News\NewsResource as NewsNewsResource;

class NewsController extends Controller
{
    public function index()
    {
        $items = Post::all();

        if (!$items->count()) {
            return BaseController::jsonResponseSuccessError(false, 'Tidak ada data!');
        }

        return BaseController::jsonResponseSuccessError(true, 'Data berhasil ditemukan!', NewsNewsResource::collection($items));
    }

    public function show($id)
    {
        $items = Post::find($id);

        if (!$items) {
            // abort(code: 404, message: 'Data tidak ditemukan!');
            return BaseController::jsonResponseSuccessError(false, 'Tidak ada data!');
        }

        return BaseController::jsonResponseSuccessError(true, 'Data berhasil ditemukan!', new NewsDetailResource($items));
    }
}
