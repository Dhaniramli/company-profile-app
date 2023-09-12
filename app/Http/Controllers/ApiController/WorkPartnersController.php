<?php

namespace App\Http\Controllers\ApiController;

use App\Http\Controllers\Controller;
use App\Http\Resources\WorkPartners\WorkPartnersResource;
use App\Models\WorkPartners;
use Illuminate\Http\Request;

class WorkPartnersController extends Controller
{
    public function index(){
        $items = WorkPartners::all();

        if (!$items->count()) {
            abort(code: 404, message: 'Tidak ada data!');
        }

        return WorkPartnersResource::collection($items);
    }
}
