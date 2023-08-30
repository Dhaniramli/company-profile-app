<?php

namespace App\Http\Controllers;

use App\Models\PejabatStruktural;
use Illuminate\Http\Request;

class PejabatStrukturalController extends Controller
{
    public function index(){
        return view('structural_officials.index',[
            'active' => 'pejabat-struktural',
            'pejabats' => PejabatStruktural::all(),
        ]);
    }
}
