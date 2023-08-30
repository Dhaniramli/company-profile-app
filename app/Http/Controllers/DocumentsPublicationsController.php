<?php

namespace App\Http\Controllers;

use App\Models\DocumentsPublications;
use Illuminate\Http\Request;

class DocumentsPublicationsController extends Controller
{
    public function index(){
        return view('documents_publications.index',[
            'active' => 'sakip',
            'sakips' => DocumentsPublications::all()
        ]);
    }
}
