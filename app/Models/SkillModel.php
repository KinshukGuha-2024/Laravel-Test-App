<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Notifications\Notifiable;

class SkillModel extends Model
{
    use HasFactory, Notifiable;
    protected $table = 'skill';

    protected $fillable = [
        'user_id',
        'skill_name',
        'skill_percent'
    ];
}