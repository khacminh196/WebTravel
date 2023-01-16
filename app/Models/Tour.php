<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Tour extends Model
{
    protected $table = 'tours';

    protected $fillable = [
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
}
