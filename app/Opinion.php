<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Opinion extends Model
{
    protected $fillable = ['body','customer_id','statue'];
    public function customer(){
        return $this->belongsTo(Customer::class,'customer_id','id');
    }
}
