<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Report extends Model
{
    use HasApiTokens, HasFactory, Notifiable;

    protected $guarded = ['id'];
}
