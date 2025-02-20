<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class UserVisit extends Model
{
    protected $fillable = [
        'ip_address', 'user_agent', 'referrer_url', 'session_id', 'geo_location'
    ];

    public $timestamps = true;
}
