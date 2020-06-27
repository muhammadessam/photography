<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    protected $guarded = [];

    public function Order()
    {
        return $this->hasMany(Category::class, 'cat_id', 'id');
    }
}
