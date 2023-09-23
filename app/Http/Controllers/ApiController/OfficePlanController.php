<?php

namespace App\Http\Controllers\ApiController;

use App\Models\OfficePlan;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Resources\OfficePlan\OfficePlanResource;
use App\Http\Controllers\ApiController\BaseController;

class OfficePlanController extends Controller
{
    public function index()
    {
        $items = OfficePlan::all();

        if (!$items->count()) {
            // abort(code: 404, message: 'Tidak ada data!');
            return BaseController::jsonResponseSuccessError(false, 'Tidak ada data!');
        }

        return BaseController::jsonResponseSuccessError(true, 'Data berhasil ditemukan!', OfficePlanResource::collection($items));
    }
}
