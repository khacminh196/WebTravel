<?php

namespace App\Models;

use App\Enums\Constant;
use Illuminate\Database\Eloquent\Model;

class Tour extends Model
{
    protected $table = 'tours';

    protected $fillable = [
        'language',
        'country_id',
        'name',
        'num_of_day',
        'cost',
        'image_link',
        'tag',
        'description',
        'content',
    ];

    public function country()
    {
        return $this->belongsTo(Country::class);
    }

    public function prefectures()
    {
        return $this->belongsToMany(Prefecture::class, TourPrefecture::class, 'tour_id', 'prefecture_id');
    }

    public function images()
    {
        return $this->hasMany(TourImage::class)->where('display', Constant::DISPLAY['SHOW']);
    }
}
