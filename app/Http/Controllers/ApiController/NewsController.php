<?php

namespace App\Http\Controllers\ApiController;

use App\Models\Post;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Resources\News\NewsDetailResource;
use App\Http\Resources\News\NewsResource as NewsNewsResource;

class NewsController extends Controller
{
    public function index()
    {
        $items = Post::all();

        if (!$items->count()) {
            return response()->json(['message' => 'Tidak ada Data!'], 404);
        }

        return NewsNewsResource::collection($items);
    }

    public function show($id)
    {
        $items = Post::find($id);

        if (!$items) {
            abort(code: 404, message: 'Data tidak ditemukan!');
        }

        return new NewsDetailResource($items);
    }
}
