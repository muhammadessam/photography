<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Customer extends Model
{
    protected $fillable = [
        'phone',
        'city',
        'verified',
        'user_id',
        'image',
    ];
    public function user(){
        return $this->belongsTo(User::class,'user_id','id');
    }
    public function orders(){
        return $this->hasMany(Order::class,'customer_id','id');
    }
    public function bills(){
        return $this->hasMany(Bill::class,'customer_id','id');
    }
}
