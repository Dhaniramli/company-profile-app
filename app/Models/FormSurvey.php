<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FormSurvey extends Model
{
    use HasFactory;

    protected $guarded = ['id'];

    public function answerResult(){
        return $this->hasMany(AnswerResult::class);
    }
}
