<?php

namespace App\Http\Controllers;

use App\Models\UnitKerja;
use Illuminate\Http\Request;
use \Cviebrock\EloquentSluggable\Services\SlugService;

class AdminUnitKerjaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('admin.unit-kerja.index',[
            'unitKerjas' => UnitKerja::all(),
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.unit-kerja.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'title' => 'required|max:255',
            'slug' => 'required|unique:unit_kerjas',
            'location' => 'required|max:255',
            'job_function' => 'required',
        ]);

        UnitKerja::create($validatedData);

        return redirect('/admin/unit-kerja')->with('success', 'Berhasil ditambahkan!');
    }

    /**
     * Display the specified resource.
     */
    public function show(UnitKerja $unitKerja)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(UnitKerja $unitKerja)
    {
        return view('admin.unit-kerja.edit', [
            'unitKerja' => $unitKerja,
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, UnitKerja $unitKerja)
    {
        $rules = [
            'title' => 'required|max:255',
            'location' => 'required|max:255',
            'job_function' => 'required',
        ];

        if ($request->slug != $unitKerja->slug) {
            $rules['slug'] = 'required|unique:unit_kerjas';
        }

        $validatedData = $request->validate($rules);

        UnitKerja::where('id', $unitKerja->id)->update($validatedData);

        return redirect('/admin/unit-kerja')->with('success', 'Unit Kerja diperbarui!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(UnitKerja $unitKerja)
    {
        UnitKerja::destroy($unitKerja->id);

        return redirect('/admin/unit-kerja')->with('success', 'Berhasil dihapus!');
    }

    public function checkSlugUnit(Request $request)
    {
        $slug = SlugService::createSlug(UnitKerja::class, 'slug', $request->title);
        
        return response()->json(['slug' => $slug]);
    }
}
