<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class book extends Model
{
    protected $fillable = [
        'category_id',
        'bookname',
        'cover_image',
        'views',
        'likes',
    ];

    public function bookcategory()
    {
        return $this->belongsTo(category::class, 'category_id');
    }
}
