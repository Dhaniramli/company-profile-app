<?php

namespace App\Http\Controllers\ApiController;

use App\Http\Controllers\Controller;
use App\Http\Resources\JobFunction\JobFuctionResource;
use App\Models\JobFunction;
use Illuminate\Http\Request;

class JobFunctionController extends Controller
{
    public function index(){
        $items = JobFunction::all();

        if (!$items->count()) {
            abort(code: 404, message: 'Tidak ada data!');
        }

        return JobFuctionResource::collection($items);
    }
}
