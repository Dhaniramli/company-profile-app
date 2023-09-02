<?php

namespace App\Http\Controllers;

use App\Models\Report;
use Illuminate\Http\Request;

class AdminReportController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('admin.report.index', [
            'reports' => Report::all(),
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
        //
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        return view('admin.report.show', [
            'report' => Report::findOrFail($id)->first(),
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Report $report)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function report_verification($id)
    {
        $userSurvey = Report::where('id', $id)->first();

        $userSurvey->status = true;
        $userSurvey->update();

        return redirect('/admin/pengaduan-masyarakat')->with('success', 'Berita diperbarui!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $soal = Report::where('id', $id)->first();
        $soal->delete();

        return redirect('/admin/pengaduan-masyarakat')->with('success', 'Berita berhasil dihapus!');
    }
}
