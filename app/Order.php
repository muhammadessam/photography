<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    protected $guarded = [];

    public function category()
    {
        return $this->belongsTo(Category::class, 'cat_id', 'id');
    }
}
