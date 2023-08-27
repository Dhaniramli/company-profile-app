<?php

namespace App\Http\Controllers;

use App\Models\PositionAddress;
use Illuminate\Http\Request;

class AdminPositionAddressController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('admin.position_address.index', [
            'position_address' => PositionAddress::all()
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
            'body' => 'required',
        ]);

        PositionAddress::create($validatedData);

        return redirect('/admin/kedudukan-alamat')->with('success', 'Berhasil disimpan!');
    }

    /**
 * Display the specified resource.
     */
    public function show(PositionAddress $positionAddress)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(PositionAddress $positionAddress)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, PositionAddress $positionAddress)
    {
        $validatedData = $request->validate([
            'body' => 'required',
        ]);

        PositionAddress::where('id', '1')->update($validatedData);

        return redirect('/admin/kedudukan-alamat')->with('success', 'Berhasil disimpan!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(PositionAddress $positionAddress)
    {
        //
    }
}
