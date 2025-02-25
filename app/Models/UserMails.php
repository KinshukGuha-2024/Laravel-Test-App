<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class UserMails extends Model
{
    protected $table = 'user_mails';

    protected $fillable = [
        'name',
        'email',
        'subject',
        'message'
    ];
}
