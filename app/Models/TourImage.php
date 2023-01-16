<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class TourImage extends Model
{
    protected $table = 'tour_images';

    protected $fillable = [
        'tour_id',
        'type',
        'link',
        'display',
    ];
}
