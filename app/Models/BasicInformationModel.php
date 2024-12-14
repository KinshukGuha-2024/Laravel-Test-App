<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Notifications\Notifiable;

class BasicInformationModel extends Model
{
    /** @use HasFactory<\Database\Factories\UserFactory> */
    use HasFactory, Notifiable;
    protected $table = 'basic_info_user';

    protected $fillable = [
        'name',
        'first_name',
        'last_name',
        'active',
        'email',
        'mobile',
        'country',
        'state',
        'city',
        'pincode',
        'role',
        'about',
        'facebook_id',
        'github_id',
        'linked_in_id',
        'image_path'
    ];

    
}
