<?php

namespace App\Http\Controllers\ApiController;

use Illuminate\Http\Request;
use App\Models\PositionAddress;
use App\Http\Controllers\Controller;
use App\Http\Controllers\ApiController\BaseController;
use App\Http\Resources\PositionAddress\PositionAddressResource;

class PositionAddressController extends Controller
{
    public function index()
    {
        $items = PositionAddress::all();

        if (!$items->count()) {
            // abort(code: 404, message: 'Tidak ada data!');
            return BaseController::jsonResponseSuccessError(false, 'Tidak ada data!');
        }

        return BaseController::jsonResponseSuccessError(true, 'Data berhasil ditemukan!', PositionAddressResource::collection($items));
    }
}
