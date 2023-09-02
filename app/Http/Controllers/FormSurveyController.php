<?php

namespace App\Http\Controllers;

use App\Models\Question;
use Illuminate\Http\Request;

class FormSurveyController extends Controller
{
    public function index(){
        return view('form_survey.index', [
            'active' => 'pengaduan2',
        ]);
    }

    public function create(){
        return view('form_survey.create_general', [
            'active' => 'pengaduan2',
            'questions' => Question::all(),
        ]);
    }

    public function store(Request $request){
        $validatedData = $request->validate([
            'name' => 'required|max:255',
            'gender' => 'required|max:255',
            'work' => 'required|max:255',
            'email' => 'required|email',
        ]);

        $questionDataUser = [
            'name' => 'required|max:255',
            'gender' => 'required|max:255',
            'work' => 'required|max:255',
            'email' => 'required|email',
        ];

        Question::create($validatedData);

        return redirect('/admin/posts')->with('success', 'Berita berhasil ditambahkan!');
    }
}
