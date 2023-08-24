<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;

class NewsController extends Controller
{
    public function index()
    {
        return view('news',[
            'active' => 'news',
            'posts'=> Post::latest()->paginate(8)->withQueryString(),
        ]);
    }
}
