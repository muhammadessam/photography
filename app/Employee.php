<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Employee extends Model
{
    protected $guarded = [];

    public function category()
    {
        return $this->belongsTo(Category::class, 'cat_id', 'id');
    }

    public function orders()
    {
        return $this->belongsToMany(Order::class, 'employee_order', 'employee_id', 'order_id')->withPivot('stars');
    }

}
