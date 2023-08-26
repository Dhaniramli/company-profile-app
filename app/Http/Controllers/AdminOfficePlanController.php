<?php

namespace App\Http\Controllers;

use App\Models\OfficePlan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class AdminOfficePlanController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('admin.office_plan.index', [
            'office_plan' => OfficePlan::all()
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
            $validatedData['image'] = $request->file('image')->store('office-plan-images');
        }

        OfficePlan::create($validatedData);

        return redirect('/admin/denah-kantor')->with('success', 'Berhasil disimpan!');
    }

    /**
     * Display the specified resource.
     */
    public function show(OfficePlan $officePlan)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(OfficePlan $officePlan)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, OfficePlan $officePlan)
    {
        $rules = [
            'image' => 'required|image',
        ];

        $validatedData = $request->validate($rules);

        if ($request->file('image')) {
            if($request->oldImage){
                Storage::delete($request->oldImage);
            }
            $validatedData['image'] = $request->file('image')->store('office-plan-images');
        }


        OfficePlan::where('id', '1')->update($validatedData);

        return redirect('/admin/denah-kantor')->with('success', 'Berhasil disimpan!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(OfficePlan $officePlan)
    {
        //
    }
}
