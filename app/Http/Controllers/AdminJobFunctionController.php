<?php

namespace App\Http\Controllers;

use App\Models\JobFunction;
use Illuminate\Http\Request;

class AdminJobFunctionController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('admin.job_function.index', [
            'job_function' => JobFunction::all()
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

        JobFunction::create($validatedData);

        return redirect('/admin/tugas-fungsi')->with('success', 'Berhasil disimpan!');
    }

    /**
     * Display the specified resource.
     */
    public function show(JobFunction $jobFunction)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(JobFunction $jobFunction)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, JobFunction $jobFunction)
    {
        $validatedData = $request->validate([
            'body' => 'required',
        ]);

        JobFunction::where('id', '1')->update($validatedData);

        return redirect('/admin/tugas-fungsi')->with('success', 'Berhasil disimpan!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(JobFunction $jobFunction)
    {
        //
    }
}
