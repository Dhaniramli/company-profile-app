<?php

namespace App\Http\Controllers;

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
        ]);
    }
}
