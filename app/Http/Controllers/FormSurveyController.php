<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class FormSurveyController extends Controller
{
    public function index(){
        return view('form_survey', [
            'active' => 'pengaduan2',
        ]);
    }
}
