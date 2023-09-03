<?php

namespace App\Http\Controllers;

use App\Models\DocumentsPublications;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class AdminDocumentsPublicationsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('admin.documents_publications.index', [
            'items' => DocumentsPublications::all(),
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.documents_publications.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'title' => 'required|max:255',
            'file' => 'required',
        ]);

        // if ($request->file('file')) {
        //     $validatedData['file'] = $request->file('file')->store('file-document-publication');
        // }

        // MENYIMPAN FILE TANPA MENGUBAH NAMA
        // if ($request->file('file')) {
        //     $validatedData['file'] = $request->file('file')->storeAs('file-document-publication', $request->file('file')->getClientOriginalName());
        // }

        // MENYIMPAN DAN NAMANYA MENGAMBIL DARI TITLE
        if ($request->file('file')) {
            $title = $validatedData['title'];
            $extension = $request->file('file')->getClientOriginalExtension();
            $fileName = $title . '.' . $extension;
            
            $validatedData['file'] = $request->file('file')->storeAs('file-document-publication', $fileName);
        }
        

        DocumentsPublications::create($validatedData);

        return redirect('/admin/dokumen-publikasi')->with('success', 'Berhasil ditambahkan!');
    }

    /**
     * Display the specified resource.
     */
    public function show(DocumentsPublications $documentsPublications)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        return view('admin.documents_publications.edit',[
            'item' => DocumentsPublications::find($id),
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, DocumentsPublications $documentsPublications)
    {
        $rules = [
            'title' => 'required|max:255',
        ];

        $validatedData = $request->validate($rules);

        // if ($request->file('file')) {
        //     if($request->oldFile){
        //         Storage::delete($request->oldFile);
        //     }
        //     $title = $validatedData['title'];
        //     $extension = $request->file('file')->getClientOriginalExtension();
        //     $fileName = $title . '.' . $extension;
        //     $validatedData['file'] = $request->file('file')->storeAs('file-document-publication', $fileName);
        // }

        if ($request->file('file')) {
            if ($request->oldFile) {
                Storage::delete($request->oldFile);
            }
            
            $title = $validatedData['title'];
            $extension = $request->file('file')->getClientOriginalExtension();
            $fileName = $title . '.' . $extension;
            
            $validatedData['file'] = $request->file('file')->storeAs('file-document-publication', $fileName);
        } elseif ($request->oldFile && $validatedData['title'] != $request->oldTitle) {
            // Jika tidak ada file baru diunggah dan title berubah
            // Anda dapat mengubah nama file sesuai dengan title baru
            $newFileName = $validatedData['title'] . '.' . pathinfo($request->oldFile, PATHINFO_EXTENSION);
            Storage::move($request->oldFile, 'file-document-publication/' . $newFileName);
            $validatedData['file'] = 'file-document-publication/' . $newFileName;
        }


        DocumentsPublications::where('id', $request->id)->update($validatedData);

        return redirect('/admin/dokumen-publikasi')->with('success', 'Berhasil diperbaharui!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $docPub = DocumentsPublications::find($id);

        $docPub->delete();

        if($docPub->file){
            Storage::delete($docPub->file);
        }

        return redirect('/admin/dokumen-publikasi');
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

        return redirect('/admin/dokumen-publikasi')->with('success', 'Berhasil diperbarui!');
    }
}
