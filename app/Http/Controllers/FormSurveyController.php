<?php

namespace App\Http\Controllers;

use App\Models\AnswerResult;
use App\Models\FormSurvey;
use App\Models\Question;
use Illuminate\Http\Request;

class FormSurveyController extends Controller
{
    public function index()
    {
        return view('form_survey.index', [
            'active' => 'pengaduan2',
        ]);
    }

    public function create()
    {
        return view('form_survey.create_general', [
            'active' => 'pengaduan2',
            'questions' => Question::all(),
        ]);
    }

    public function store(Request $request)
    {
        // Mengambil data dari formulir untuk data diri
        $nama = $request->input('name');
        $jender = $request->input('jender');
        $pekerjaan = $request->input('job');
        $email = $request->input('email');
        $comment = $request->input('comment');

        // Menyimpan data data diri ke dalam tabel 'users' (atau tabel yang sesuai)
        $user = FormSurvey::create([
            'name' => $nama,
            'jender' => $jender,
            'job' => $pekerjaan,
            'email' => $email,
            'comment' => $comment,
        ]);

        // Mengambil data dari formulir untuk jawaban kuesioner
        foreach ($request->all() as $key => $value) {
            // Cek apakah nama field pertanyaan
            if (strpos($key, 'pertanyaan_') === 0) {
                $idPertanyaan = str_replace('pertanyaan_', '', $key);
                $jawaban = $value;

                // Dapatkan pertanyaan yang sesuai dengan ID pertanyaan
                $pertanyaan = Question::find($idPertanyaan)->questions;


                // Simpan data jawaban kuesioner ke dalam tabel AnswerResult
                AnswerResult::create([
                    'form_survey_id' => $user->id, // Mengaitkan data dengan ID pengguna yang baru dibuat
                    'question_result' => $pertanyaan, // Gantilah dengan field yang sesuai
                    'answer_result' => $jawaban,
                ]);
            }
        }


        return redirect('/form-survey/penunjang-urusan-pemerintahan-umum')->with('success', 'Berhasil dikirim!');
    }
}
