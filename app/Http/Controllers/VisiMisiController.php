<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\VisiMisi;

class VisiMisiController extends Controller
{
    public function index()
    {
        return view('vision_mission.index',[
            'active' => 'visi-misi',
            'vision_mission'=> VisiMisi::all(),
        ]);
    }
}
