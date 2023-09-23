<?php

namespace App\Http\Controllers\ApiController;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\OrganizationalStructure;
use App\Http\Controllers\ApiController\BaseController;
use App\Http\Resources\OrganizationalStructure\OrganizationalStructureResource;

class OrganizationalStructureController extends Controller
{
    public function index()
    {
        $items = OrganizationalStructure::all();

        if (!$items->count()) {
            // abort(code: 404, message: 'Tidak ada data!');
            return BaseController::jsonResponseSuccessError(false, 'Tidak ada data!');
        }

        return BaseController::jsonResponseSuccessError(true, 'Data berhasil ditemukan!', OrganizationalStructureResource::collection($items));
    }
}
