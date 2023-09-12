<?php

namespace App\Http\Controllers\ApiController;

use App\Http\Controllers\Controller;
use App\Http\Resources\OrganizationalStructure\OrganizationalStructureResource;
use App\Models\OrganizationalStructure;
use Illuminate\Http\Request;

class OrganizationalStructureController extends Controller
{
    public function index(){
        $items = OrganizationalStructure::all();

        if (!$items->count()) {
            abort(code: 404, message: 'Tidak ada data!');
        }

        return OrganizationalStructureResource::collection($items);
    }
}
