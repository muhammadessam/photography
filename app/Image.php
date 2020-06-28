<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Image extends Model
{
    protected $fillable = ['image','order_id'];
    public function order(){
        return $this->belongsTo(Order::class,'order_id','id');
    }
}
