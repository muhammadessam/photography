<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Customer extends Model
{
    protected $fillable = [
        'phone',
        'city',
        'verified',
        'user_id',
    ];
}
