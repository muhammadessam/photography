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

    public function employees()
    {
        return $this->belongsToMany(Employee::class, 'employee_order', 'order_id', 'employee_id')->withPivot('stars');
    }

    public function customer()
    {
        return $this->belongsTo(Customer::class, 'customer_id', 'id');
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
            return 'تم القبول نهائيا';
        if ($this->status == 'rejected')
            return 'تم الرفض';
    }
}
