<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Video extends Model
{
    protected $fillable = ['video','order_id','local'];
    public function order(){
        return $this->belongsTo(Order::class,'order_id','id');
    }
}
