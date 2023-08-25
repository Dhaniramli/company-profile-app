<?php

namespace App\Http\Controllers;

use App\Models\PejabatStruktural;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class AdminPejabatStrukturalController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('admin.pejabat-struktural.index', [
            'pejabats' => PejabatStruktural::all(),
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.pejabat-struktural.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'nama' => 'required|max:255',
            'jabatan' => 'required|max:255',
            'nomor' => 'required|max:255',
            'gambar' => 'image|file|max:1024',
        ]);
        if ($request->file('gambar')) {
            $validatedData['gambar'] = $request->file('gambar')->store('gambar-pejabat');
        }

        PejabatStruktural::create($validatedData);

        return redirect('/admin/pejabat-struktural')->with('success', 'Berhasil ditambahkan!');
    }

    /**
     * Display the specified resource.
     */
    public function show(PejabatStruktural $pejabatStruktural)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(PejabatStruktural $pejabatStruktural)
    {
        return view('admin.pejabat-struktural.edit', [
            'pejabat' => $pejabatStruktural,
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, PejabatStruktural $pejabatStruktural)
    {
        $rules = [
            'nama' => 'required|max:255',
            'jabatan' => 'required|max:255',
            'nomor' => 'required|max:255',
            'gambar' => 'image|file|max:1024',
        ];

        $validatedData = $request->validate($rules);

        if ($request->file('gambar')) {
            if($request->oldImage){
                Storage::delete($request->oldImage);
            }
            $validatedData['gambar'] = $request->file('gambar')->store('gambar-pejabat');
        }


        PejabatStruktural::where('id', $pejabatStruktural->id)->update($validatedData);

        return redirect('/admin/pejabat-struktural')->with('success', 'Berita diperbarui!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(PejabatStruktural $pejabatStruktural)
    {
        if($pejabatStruktural->image){
            Storage::delete($pejabatStruktural->image);
        }
        PejabatStruktural::destroy($pejabatStruktural->id);

        return redirect('/admin/pejabat-struktural')->with('success', 'Berhasil dihapus!');
    }
}
