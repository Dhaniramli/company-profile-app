<?php

namespace App\Http\Controllers;

use App\Models\WorkPartners;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class AdminWorkPartnersController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('admin.work_partners.index',[
            'items' => WorkPartners::all(),
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.work_partners.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'title' => 'required|max:255',
            'image' => 'image|file|max:1024',
        ]);

        if ($request->file('image')) {
            $validatedData['image'] = $request->file('image')->store('work-partners-images');
        }


        WorkPartners::create($validatedData);

        return redirect('/admin/mitra-kerja')->with('success', 'Berhasil ditambahkan!');
    }

    /**
     * Display the specified resource.
     */
    public function show(WorkPartners $workPartners)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        return view('admin.work_partners.edit', [
            'item' => WorkPartners::find($id),
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, WorkPartners $workPartners)
    {
        $rules = [
            'title' => 'required|max:255',
            'image' => 'image',
        ];

        $validatedData = $request->validate($rules);

        if ($request->file('image')) {
            if($request->oldImage){
                Storage::delete($request->oldImage);
            }
            $validatedData['image'] = $request->file('image')->store('work-partners-images');
        }

        WorkPartners::where('id', $request->id)->update($validatedData);

        return redirect('/admin/mitra-kerja')->with('success', 'Gambar diperbarui!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $items = WorkPartners::find($id);
        
        if($items->image){
            Storage::delete($items->image);
        }
        $items->delete();


        return redirect('/admin/mitra-kerja')->with('success', 'Berhasil dihapus!');
    }
}
