<?php

namespace App\Http\Controllers\ApiController;

use App\Http\Controllers\Controller;
use App\Http\Resources\WorkUnit\WorkUnitDetailResource;
use App\Http\Resources\WorkUnit\WorkUnitResource;
use App\Models\UnitKerja;
use Illuminate\Http\Request;

class WorkUnitController extends Controller
{
    public function index(){
        $items = UnitKerja::all();

        if (!$items->count()) {
            abort(code: 404, message: 'Tidak ada data!');
        }

        return WorkUnitResource::collection($items);
    }

    public function show($id){
        $items = UnitKerja::find($id);

        if (!$items) {
            abort(code: 404, message: 'Data tidak ditemukan!');
        }

        return new WorkUnitDetailResource($items);
    }
}
