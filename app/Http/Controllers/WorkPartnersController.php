<?php

namespace App\Http\Controllers;

use App\Models\WorkPartners;
use Illuminate\Http\Request;

class WorkPartnersController extends Controller
{
    public function index(){
        return view('work_partners.index',[
            'active' => 'mitra-kerja',
            'workPartners' => WorkPartners::all()
        ]);
    }
}
