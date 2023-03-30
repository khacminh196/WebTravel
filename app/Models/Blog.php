<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Blog extends Model
{
    protected $fillable = [
        'category_id',
        'title',
        'description',
        'body',
        'image_link',
        'is_public',
        'tour_id',
    ];

    public function category()
    {
        return $this->belongsTo(Category::class);
    }
}
