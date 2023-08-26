<?php

namespace App\Http\Controllers;

use App\Models\OrganizationalStructure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class AdminOrganizationalStructureController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('admin.organizational_structure.index', [
            'organizational_structure' => OrganizationalStructure::all()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'image' => 'required|image',
        ]);

        if ($request->file('image')) {
            $validatedData['image'] = $request->file('image')->store('organizational-structure-images');
        }

        OrganizationalStructure::create($validatedData);

        return redirect('/admin/struktur-organisasi')->with('success', 'Berhasil disimpan!');
    }

    /**
     * Display the specified resource.
     */
    public function show(OrganizationalStructure $organizationalStructure)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(OrganizationalStructure $organizationalStructure)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, OrganizationalStructure $organizationalStructure)
    {
        $rules = [
            'image' => 'required|image',
        ];

        $validatedData = $request->validate($rules);

        if ($request->file('image')) {
            if($request->oldImage){
                Storage::delete($request->oldImage);
            }
            $validatedData['image'] = $request->file('image')->store('organizational-structure-images');
        }


        OrganizationalStructure::where('id', '1')->update($validatedData);

        return redirect('/admin/struktur-organisasi')->with('success', 'Berhasil disimpan!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(OrganizationalStructure $organizationalStructure)
    {
        //
    }
}
