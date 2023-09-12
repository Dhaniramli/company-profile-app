<?php

namespace App\Http\Controllers\ApiController;

use App\Http\Controllers\Controller;
use App\Http\Resources\DocumentsPublications\DocumentsPublicationsResource;
use App\Models\DocumentsPublications;
use Illuminate\Http\Request;

class DocumentsPublicationsController extends Controller
{
    public function index(){
        $items = DocumentsPublications::all();

        if (!$items->count()) {
            // Handel jika data tidak ditemukan
            return response()->json(['message' => 'Tidak ada data!'], 404);
        }

        return DocumentsPublicationsResource::collection($items);
    }

    public function download($id)
    {
        $docPub = DocumentsPublications::find($id);

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

        return new DocumentsPublicationsResource($docPub);
    }
}
