<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Employee extends Model
{
    protected $fillable = ['name', 'phone', 'email', 'exp', 'cat_id'];

    public function category()
    {
        return $this->belongsTo(Category::class, 'cat_id', 'id');
    }

    public function orders()
    {
        return $this->belongsToMany(Employee::class, 'employee_order', 'employee_id', 'order_id');
    }

}
