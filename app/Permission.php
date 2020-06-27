<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Permission extends Model
{
    protected $fillable = [
        'admin_id',
        'admins',
        'employees',
        'customers',
        'categories',
        'settings',
        'bills',
        'orders',
    ];
}
