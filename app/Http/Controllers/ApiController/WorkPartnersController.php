<?php

namespace App\Http\Controllers\ApiController;

use App\Models\WorkPartners;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Controllers\ApiController\BaseController;
use App\Http\Resources\WorkPartners\WorkPartnersResource;

class WorkPartnersController extends Controller
{
    public function index()
    {
        $items = WorkPartners::all();

        if (!$items->count()) {
            // abort(code: 404, message: 'Tidak ada data!');
            return BaseController::jsonResponseSuccessError(false, 'Tidak ada data!');
        }

        return BaseController::jsonResponseSuccessError(true, 'Data berhasil ditemukan!', WorkPartnersResource::collection($items));
    }
}
