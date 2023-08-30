<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;

class NewsController extends Controller
{
    public function index()
    {
        return view('news.index',[
            'active' => 'news',
            'posts'=> Post::latest()->paginate(8)->withQueryString(),
        ]);
    }

    public function show(Post $post)
    {
        return view('news.detail', [
            "title" => "Single Post",
            "active" => "news",
            "post" => $post,
        ]);
    }
}
