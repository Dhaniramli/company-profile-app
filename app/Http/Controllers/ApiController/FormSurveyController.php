<?php

namespace App\Http\Controllers\ApiController;

use App\Models\Question;
use App\Models\FormSurvey;
use App\Models\AnswerResult;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Resources\Question\QuestionResource;
use App\Http\Controllers\ApiController\BaseController;

class FormSurveyController extends Controller
{
    public function kuesioner()
    {
        $items = Question::with('answers')->get();

        if (!$items->count()) {
            return BaseController::jsonResponseSuccessError(false, 'Tidak ada Data!');
        }

        $questionData = $items->map(function ($question) {
            $data = [
                'id' => $question->id,
                'questions' => $question->questions,
                'created_at' => date_format($question->created_at, "Y/m/d H:i:s"),
                'options' => [], // Inisialisasi array untuk opsi jawaban
            ];

            // Loop melalui jawaban dan tambahkan ke dalam array options
            foreach ($question->answers as $answer) {
                // Hanya tambahkan opsi yang tidak null
                if (!is_null($answer->A)) {
                    $data['options'][] = $answer->A;
                }
                if (!is_null($answer->B)) {
                    $data['options'][] = $answer->B;
                }
                if (!is_null($answer->C)) {
                    $data['options'][] = $answer->C;
                }
                if (!is_null($answer->D)) {
                    $data['options'][] = $answer->D;
                }
                if (!is_null($answer->E)) {
                    $data['options'][] = $answer->E;
                }
            }

            return $data;
        });

        return BaseController::jsonResponseSuccessError(true, 'Data berhasil ditemukan!', $questionData);
    }


    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'jender' => 'required', // Atur nilai yang diterima sesuai dengan kebutuhan Anda
            'job' => 'required|string|max:255',
            'email' => 'required|email|unique:form_surveys,email|max:255',
        ]);

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

        // Inisialisasi variabel $result sebagai array di luar loop
        $result = [];

        // Mengambil data dari formulir untuk jawaban kuesioner
        foreach ($request->all() as $key => $value) {
            // Cek apakah nama field pertanyaan
            if (strpos($key, 'pertanyaan_') === 0) {
                $idPertanyaan = str_replace('pertanyaan_', '', $key);
                $jawaban = $value;

                // Dapatkan pertanyaan yang sesuai dengan ID pertanyaan
                $pertanyaan = Question::find($idPertanyaan)->questions;

                // Simpan data jawaban kuesioner ke dalam array $result
                $result[] = [
                    'form_survey_id' => $user->id, // Mengaitkan data dengan ID pengguna yang baru dibuat
                    'question_result' => $pertanyaan, // Gantilah dengan field yang sesuai
                    'answer_result' => $jawaban,
                ];
            }
        }

        $responseData = [
            'user' => $user,
            'result' => $result,
        ];

        return BaseController::jsonResponseSuccessError(true, 'Data berhasil ditemukan!', $responseData);
    }
}
