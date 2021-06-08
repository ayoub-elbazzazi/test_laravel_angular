<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Task extends Model
{
    protected $fillable=[
        'title','priority'
    ];

    public function category()
    {
        return $this->belongsTo(Category::class);
    }
}
