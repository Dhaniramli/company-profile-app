<?php

namespace App\Http\Controllers;

use App\Models\AnswerResult;
use App\Models\FormSurvey;
use Illuminate\Http\Request;

class AdminResultController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('admin.society_survey.result',[
            'surveys' => FormSurvey::latest()->get(),
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
    public function show(string $id)
    {
        return view('admin.society_survey.show', [
            'survey' => FormSurvey::find($id),
            'results' => AnswerResult::where('survey_id', $id)->get()
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $soal = FormSurvey::where('id', $id)->first();
        $soal->delete();

        return redirect('/admin/hasil-survey-masyarakat')->with('success', 'Berhasil dihapus!');
    }
}
