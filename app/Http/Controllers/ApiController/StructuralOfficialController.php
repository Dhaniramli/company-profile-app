<?php

namespace App\Http\Controllers\ApiController;

use Illuminate\Http\Request;
use App\Models\PejabatStruktural;
use App\Http\Controllers\Controller;
use App\Http\Controllers\ApiController\BaseController;
use App\Http\Resources\StructuralOfficial\StructuralOfficialResource;

class StructuralOfficialController extends Controller
{
    public function index()
    {
        $items = PejabatStruktural::all();

        if (!$items->count()) {
            // abort(code: 404, message: 'Tidak ada data!');
            return BaseController::jsonResponseSuccessError(false, 'Tidak ada data!');
        }

        return BaseController::jsonResponseSuccessError(true, 'Data berhasil ditemukan!', StructuralOfficialResource::collection($items));
    }
}
