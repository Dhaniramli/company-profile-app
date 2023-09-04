<?php

namespace App\Http\Controllers;

use App\Models\Answer;
use App\Models\Question;
use Illuminate\Http\Request;

class AdminSocietySurveyController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('admin.society_survey.index', [
            'questions' => Question::all(),
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.society_survey.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'questions' => 'required|max:255',
        ]);

        Question::create($validatedData);

        return redirect('/admin/survey-masyarakat')->with('success', 'Berhasil ditambahkan!');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
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
        //
    }

    public function answer($id) {
        // dd(Answer::where('question_id', $id));
        return view('admin.society_survey.answer',[
            'item' => Question::find($id),
            'answer' => Answer::where('question_id', $id),
        ]);
    }

    public function store_answer(Request $request) {

        $validatedData = $request->validate([
            'A' => 'max:255',
            'B' => 'max:255',
            'C' => 'max:255',
            'D' => 'max:255',
            'E' => 'max:255',
            'question_id' => 'required',
        ]);

        Answer::create($validatedData);

        return redirect('/admin/survey-masyarakat')->with('success', 'Berhasil ditambahkan!');
    }

    public function update_jawaban(Request $request) {
        $rules = [
            'A' => 'max:255',
            'B' => 'max:255',
            'C' => 'max:255',
            'D' => 'max:255',
            'E' => 'max:255',
            'question_id' => 'required',
        ];

        $validatedData = $request->validate($rules);


        Answer::where('id', $request->id)->update($validatedData);

        return redirect('/admin/survey-masyarakat')->with('success', 'Berhasil ditambahkan!');
    }
}
