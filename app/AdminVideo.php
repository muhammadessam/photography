<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class AdminVideo extends Model
{
    protected $fillable = ['video','title','cat_id','local'];
    public function category(){
        return $this->belongsTo(Category::class,'cat_id','id');
    }
}
