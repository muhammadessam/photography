<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class AdminVideo extends Model
{
    protected $fillable = ['video','title','cat_id'];
    public function category(){
        $this->belongsTo(Category::class,'cat_id','id');
    }
}
