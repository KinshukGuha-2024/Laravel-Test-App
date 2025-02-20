<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class AccessInformation extends Model
{
    protected $table = 'access_informations';
    protected $fillable = [
        'user_agent',
        'device_type',
        'browser',
        'os',
        'ip_address',
        'country',
        'city',
        'visited_url',
        'referrer_url',
        'latitude',
        'longitude',
        'zipcode',
        'timezone',
        'state'
    ];

}
