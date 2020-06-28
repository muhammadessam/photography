<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Video extends Model
{
    protected $fillable = ['video','order_id'];
    public function order(){
        return $this->belongsTo(Order::class,'order_id','id');
    }
}
