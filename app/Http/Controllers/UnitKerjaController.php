<?php

namespace App\Http\Controllers;

use App\Models\UnitKerja;
use Illuminate\Http\Request;

class UnitKerjaController extends Controller
{
    public function index(){
        return view('unit_kerja.index',[
            'active' => 'unit-kerja',
            'unitKerjas' => UnitKerja::all(),
        ]);
    }

    public function show(UnitKerja $unitKerja)
    {
        return view('unit_kerja.detail', [
            "active" => "unit-kerja",
            "unitKerja" => $unitKerja,
        ]);
    }
}
