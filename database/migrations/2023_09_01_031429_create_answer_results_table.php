<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('answer_results', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('form_survey_id');
            $table->string('question_result');
            $table->string('answer_result');
            $table->timestamps();
            
            // $table->foreign('question_id')->references('id')->on('questions')->onDelete('cascade');
            $table->foreign('form_survey_id')->references('id')->on('form_surveys')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('answer_results');
    }
};
