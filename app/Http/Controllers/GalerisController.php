<?php

namespace App\Http\Controllers;

use App\Models\Galeri;
use Illuminate\Http\Request;

class GalerisController extends Controller
{
    public function index(){
        return view('galeri',[
            'active' => 'galeri-kegiatan',
            'galeris' => Galeri::all(),
        ]);
    }
}
