<?php

namespace App\Http\Controllers;

use App\Models\OfficePlan;
use Illuminate\Http\Request;

class OfficePlanController extends Controller
{
    public function index(){
        return view('office_plan.index',[
            'active' => 'denah-kantor',
            'office_plan' => OfficePlan::all()
        ]);
    }
}
