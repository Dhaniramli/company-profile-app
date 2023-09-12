<?php

namespace App\Http\Controllers\ApiController;

use App\Http\Controllers\Controller;
use App\Http\Resources\OfficePlan\OfficePlanResource;
use App\Models\OfficePlan;
use Illuminate\Http\Request;

class OfficePlanController extends Controller
{
    public function index(){
        $items = OfficePlan::all();

        if (!$items->count()) {
            abort(code: 404, message: 'Tidak ada data!');
        }

        return OfficePlanResource::collection($items);
    }
}
