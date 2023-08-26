<?php

namespace App\Http\Controllers;

use App\Models\OrganizationalStructure;
use Illuminate\Http\Request;

class OrganizationalStructureController extends Controller
{
    public function index(){
        return view('struktur_organisasi',[
            'active' => 'struktur-organisasi',
            'struktur_organisasi' => OrganizationalStructure::all()
        ]);
    }
}
