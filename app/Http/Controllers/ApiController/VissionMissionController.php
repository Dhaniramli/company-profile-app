<?php

namespace App\Http\Controllers\ApiController;

use App\Http\Controllers\Controller;
use App\Http\Resources\VissionMission\VissionMissionResource;
use App\Models\VisiMisi;
use Illuminate\Http\Request;
use App\Http\Controllers\ApiController\BaseController;


class VissionMissionController extends Controller
{
    public function index()
    {
        $items = VisiMisi::all();

        if (!$items->count()) {
            return BaseController::jsonResponseSuccessError(false, 'Tidak ada data!');
        }

        return BaseController::jsonResponseSuccessError(true, 'Data berhasil diambil', VissionMissionResource::collection($items));
    }
}
