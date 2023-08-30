<?php

namespace App\Http\Controllers;

use App\Models\OrganizationalStructure;
use Illuminate\Http\Request;

class OrganizationalStructureController extends Controller
{
    public function index(){
        return view('organizational_structure.index',[
            'active' => 'struktur-organisasi',
            'struktur_organisasi' => OrganizationalStructure::all()
        ]);
    }
}
