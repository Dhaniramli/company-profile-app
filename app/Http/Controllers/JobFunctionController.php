<?php

namespace App\Http\Controllers;

use App\Models\JobFunction;
use Illuminate\Http\Request;

class JobFunctionController extends Controller
{
    public function index(){
        return view('tugas_fungsi',[
            'active' => 'tugas-fungsi',
            'jobFunctions' => JobFunction::all()
        ]);
    }
}
