<?php

namespace App\Http\Controllers\ApiController;

use App\Models\Report;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Resources\Report\ReportResource;

class ReportController extends Controller
{
    public function store(Request $request) {
        $validatedData = $request->validate([
            'nik' => 'required|max:255',
            'name' => 'required|max:255',
            'email' => 'required|email',
            'phone_number' => 'required|max:255',
            'title_report' => 'required|max:255',
            'report' => 'required|max:255',
            'image_report' => 'image|file|max:1024',
            'image_ktp' => 'image|file|max:1024',
        ]);

        if ($request->file('image_report')) {
            $validatedData['image_report'] = $request->file('image_report')->store('report-images');
        }
        if ($request->file('image_ktp')) {
            $validatedData['image_ktp'] = $request->file('image_ktp')->store('ktp-images');
        }

        $report = Report::create($validatedData);

        return response()->json(['data' => $report]);
    }

    public function index() {
        $items = Report::all();

        if (!$items->count()) {
            return response()->json(['message' => 'Tidak ada Data!'], 404);
        }

        return ReportResource::collection($items);
    }
}
