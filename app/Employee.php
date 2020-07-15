<?php

namespace App;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Database\Eloquent\Model;

class Employee extends  Authenticatable
{
    protected $guard = 'employee';
    protected $fillable = ['name','email','phone','exp','cat_id','nationality','is_available','Statue'];
    protected $hidden = ['password'];
    public function category()
    {
        return $this->belongsTo(Category::class, 'cat_id', 'id');
    }

    public function orders()
    {
        return $this->belongsToMany(Order::class, 'employee_order', 'employee_id', 'order_id')->withPivot('stars');
    }

}
