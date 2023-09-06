<?php

namespace App\Models;

use App\Models\FormSurvey;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class AnswerResult extends Model
{
    use HasFactory;
    
    protected $guarded = ['id'];

    public function formSurvey(){
        return $this->belongsTo(FormSurvey::class, 'survey_id');
    }
}
