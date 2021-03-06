<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    protected $guarded = [];
    /**
     * The attributes that should be mutated to dates.
     *
     * @var array
     */
    protected $dates = [
        'date',
    ];

    public function category()
    {
        return $this->belongsTo(Category::class, 'cat_id', 'id');
    }

    public function employees()
    {
        return $this->belongsToMany(Employee::class, 'employee_order', 'order_id', 'employee_id')->withPivot('stars');
    }

    public function customer()
    {
        return $this->belongsTo(Customer::class, 'customer_id', 'id');
    }
    public function videos(){
        return $this->hasMany(Video::class,'order_id','id');
    }
    public function images(){
        return $this->hasMany(Image::class,'order_id','id');
    }
    public function comments(){
        return $this->hasMany(Comment::class,'order_id','id');
    }
    public function bills(){
        return $this->hasMany(Bill::class,'order_id','id');
    }
    public function get_status()
    {
        if ($this->status == 'waiting')
            return 'في الانتظار';
        if ($this->status == 'accepted')
            return 'تم القبول';
        if ($this->status == 'billed')
            return 'تم اصدار فاتورة غير مسددة';
        if ($this->status == 'final')
            return 'تم الانجاز';
        if ($this->status == 'rejected')
            return 'تم الرفض';
    }
    public function city(){
        return $this->belongsTo(City::class,'city_id','id');
    }
    public function country(){
        return $this->belongsTo(Country::class,'country_id','id');
    }
}
