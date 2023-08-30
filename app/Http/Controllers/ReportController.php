<?php

namespace App\Http\Controllers;

use App\Models\Report;
use Illuminate\Http\Request;

class ReportController extends Controller
{
    public function index(){
        return view('create_report',[
            'active' => 'pengaduan',
        ]);
    }
    
    public function store(Request $request){
        $validatedData = $request->validate([
            'nik' => 'required|max:255',
            'name' => 'required|max:255',
            'email' => 'required|email',
            'phone_number' => 'required|max:255',
            'title_report' => 'required|max:255',
            'report' => 'required|max:255',
            'image_report' => 'image|file|max:1024',
            'image_ktp' => 'image|file|max:1024',
        ]);

        if ($request->file('image_report')) {
            $validatedData['image_report'] = $request->file('image_report')->store('report-images');
        }
        if ($request->file('image_ktp')) {
            $validatedData['image_ktp'] = $request->file('image_ktp')->store('ktp-images');
        }

        Report::create($validatedData);

        return redirect('/pengaduan/create')->with('success', 'Berhasil dikirim!');
    }

    
    public function show(){
        return view('report_status',[
            'active' => 'pengaduan',
            'reports' => Report::all()
        ]);
    }
}
