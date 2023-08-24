<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\VisiMisi;

class VisiMisiController extends Controller
{
    public function index()
    {
        return view('visi_misi',[
            'active' => 'visi-misi',
            // 'visiMisi'=> VisiMisi::all(),
        ]);
    }
}
