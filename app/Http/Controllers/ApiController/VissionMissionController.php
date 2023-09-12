<?php

namespace App\Http\Controllers\ApiController;

use App\Http\Controllers\Controller;
use App\Http\Resources\VissionMission\VissionMissionResource;
use App\Models\VisiMisi;
use Illuminate\Http\Request;

class VissionMissionController extends Controller
{
    public function index(){
        $items = VisiMisi::all();

        if (!$items->count()) {
            abort(code: 404, message: 'Tidak ada data!');
        }

        return VissionMissionResource::collection($items);
    }
}
