<?php

namespace App\Http\Controllers;

use App\Models\Galeri;
use Illuminate\Http\Request;
use App\Models\Post;
use Spatie\Analytics\AnalyticsFacade as Analytics;


class HomeController extends Controller
{
    public function index()
    {
        return view('home',[
            'posts'=> Post::latest()->paginate(8)->withQueryString(),
            'galeris' => Galeri::all(),
            "title" => "Home",
            "active" => "home",
        ]);
    }
}
