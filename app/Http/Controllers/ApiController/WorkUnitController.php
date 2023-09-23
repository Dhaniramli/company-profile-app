<?php

namespace App\Http\Controllers\ApiController;

use App\Models\UnitKerja;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Resources\WorkUnit\WorkUnitResource;
use App\Http\Controllers\ApiController\BaseController;
use App\Http\Resources\WorkUnit\WorkUnitDetailResource;

class WorkUnitController extends Controller
{
    public function index()
    {
        $items = UnitKerja::all();

        if (!$items->count()) {
            // abort(code: 404, message: 'Tidak ada data!');
            return BaseController::jsonResponseSuccessError(false, 'Tidak ada data!');
        }

        return BaseController::jsonResponseSuccessError(true, 'Data berhasil ditemukan!', WorkUnitResource::collection($items));
    }

    public function show($id)
    {
        $items = UnitKerja::find($id);

        if (!$items) {
            // abort(code: 404, message: 'Data tidak ditemukan!');
            return BaseController::jsonResponseSuccessError(false, 'Tidak ada data!');
        }

        return BaseController::jsonResponseSuccessError(true, 'Data berhasil ditemukan!', new WorkUnitDetailResource($items));
    }
}
