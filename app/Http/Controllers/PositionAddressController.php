<?php

namespace App\Http\Controllers;

use App\Models\PositionAddress;
use Illuminate\Http\Request;

class PositionAddressController extends Controller
{
    public function index(){
        return view('position_address.index',[
            'active' => 'kedudukan',
            'positionAddress' => PositionAddress::all()
        ]);
    }
}
