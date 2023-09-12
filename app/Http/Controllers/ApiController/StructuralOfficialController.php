<?php

namespace App\Http\Controllers\ApiController;

use App\Http\Controllers\Controller;
use App\Http\Resources\StructuralOfficial\StructuralOfficialResource;
use App\Models\PejabatStruktural;
use Illuminate\Http\Request;

class StructuralOfficialController extends Controller
{
    public function index(){
        $items = PejabatStruktural::all();

        if (!$items->count()) {
            abort(code: 404, message: 'Tidak ada data!');
        }

        return StructuralOfficialResource::collection($items);
    }
}
