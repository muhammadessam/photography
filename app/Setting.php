<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Setting extends Model
{
    protected $fillable = [
        'is_closed',
        'close_msg',
        'app_name',
        'app_email',
        'contact',
        'can_register',
        'verify_email',
        'sms',
        'facebook',
        'twitter',
        'instagram',
        'youtube',
        'linked',
        'logo',
        'icon',
        'phone',
        'address',
        'instruction',
    ];
}
