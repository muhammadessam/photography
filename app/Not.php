<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Not extends Model
{
    protected $fillable = ['user_id','emp_id','admin_id','body'];
}
