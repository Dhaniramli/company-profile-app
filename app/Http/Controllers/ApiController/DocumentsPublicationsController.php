<?php

namespace App\Http\Controllers\ApiController;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\DocumentsPublications;
use App\Http\Controllers\ApiController\BaseController;
use App\Http\Resources\DocumentsPublications\DocumentsPublicationsResource;

class DocumentsPublicationsController extends Controller
{
    public function index()
    {
        $items = DocumentsPublications::all();

        if (!$items->count()) {
            // Handel jika data tidak ditemukan
            // return response()->json([
            //     'status' => false,
            //     'message' => 'Tidak ada data!'
            // ], 404);
            return BaseController::jsonResponseSuccessError(false, 'Tidak ada data!');
        }

        return BaseController::jsonResponseSuccessError(true, 'Data berhasil ditemukan!', DocumentsPublicationsResource::collection($items));
    }

    public function download($id)
    {
        $docPub = DocumentsPublications::find($id);

        if (!$docPub->count()) {
            return BaseController::jsonResponseSuccessError(false, 'Tidak ada data!');
        }

        if ($docPub) {
            $pathToFile = storage_path('app/public/' . $docPub->file);

            if (file_exists($pathToFile)) {
                return response()->download($pathToFile);
            } else {
                abort(404); // File tidak ditemukan
            }
        } else {
            abort(404); // Data dokumen tidak ditemukan
        }

        return BaseController::jsonResponseSuccessError(true, 'Data berhasil ditemukan!', new DocumentsPublicationsResource($docPub));
    }
}
