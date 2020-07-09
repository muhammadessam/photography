<?php

namespace App;

use App\Traits\HasViews;
use Illuminate\Database\Eloquent\Model;

class AdminImage extends Model
{
    use HasViews;
    
    protected $fillable = ['image', 'category_id'];

    public function category()
    {
        return $this->belongsTo(Category::class);
    }
}
