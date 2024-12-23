<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Attachments extends Model
{
    protected $fillable = [
        'type',
        'user_id',
        'attachment_path',
    ];
}
