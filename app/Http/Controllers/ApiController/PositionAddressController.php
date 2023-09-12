<?php

namespace App\Http\Controllers\ApiController;

use App\Http\Controllers\Controller;
use App\Http\Resources\PositionAddress\PositionAddressResource;
use App\Models\PositionAddress;
use Illuminate\Http\Request;

class PositionAddressController extends Controller
{
    public function index(){
        $items = PositionAddress::all();

        if (!$items->count()) {
            abort(code: 404, message: 'Tidak ada data!');
        }

        return PositionAddressResource::collection($items);
    }
}
