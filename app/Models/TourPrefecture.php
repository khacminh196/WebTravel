<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class TourPrefecture extends Model
{
    protected $table = 'tour_prefectures';

    protected $fillable = [
        'tour_id',
        'prefecture_id',
    ];
}
