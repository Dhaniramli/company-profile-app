<?php

namespace App\Http\Controllers;

use App\Models\VisiMisi;
use Illuminate\Http\Request;

class AdminVisiMisiController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('admin.visi-misi.index',[
            'dataVisiMisi' => VisiMisi::all(),
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.visi-misi.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {

        // dd($request);

        $validatedData = $request->validate([
            'title' => 'required|max:255',
            'body' => 'required',
        ]);

        // if($request->id === '1'){
            // VisiMisi::where('id', 1)->update($validatedData);
        // }

        VisiMisi::create($validatedData);

        return redirect('/admin/visi-misi')->with('success', 'New post has been added!');
    }

    /**
     * Display the specified resource.
     */
    public function show(VisiMisi $visiMisi)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(VisiMisi $visiMisi)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, VisiMisi $visiMisi)
    {
        $validatedData = $request->validate([
            'title' => 'required|max:255',
            'body' => 'required',
        ]);

        VisiMisi::where('id', $visiMisi->id)->update($validatedData);

        return redirect('/admin/visi-misi')->with('success', 'New post has been added!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(VisiMisi $visiMisi)
    {
        //
    }
}