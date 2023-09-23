<?php

namespace App\Http\Controllers\ApiController;

use App\Models\JobFunction;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Controllers\ApiController\BaseController;
use App\Http\Resources\JobFunction\JobFuctionResource;

class JobFunctionController extends Controller
{
    public function index()
    {
        $items = JobFunction::all();

        if (!$items->count()) {
            // abort(code: 404, message: 'Tidak ada data!');
            return BaseController::jsonResponseSuccessError(false, 'Tidak ada data!');
        }

        return BaseController::jsonResponseSuccessError(true, 'Data berhasil ditemukan!', JobFuctionResource::collection($items));
    }
}
