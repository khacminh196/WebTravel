<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Country extends Model
{
    public $fillable = [
        'code',
        'name',
        'image_link',
        'display'
    ];

    public function getNameAttribute($value) {
        return trans('common.countries.' . $this->code);
    }
}
