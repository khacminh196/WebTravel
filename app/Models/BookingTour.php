<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class BookingTour extends Model
{
    protected $fillable = [
        'tour_id',
        'name',
        'phone',
        'email',
        'number_of_people',
        'expected_travel_time',
        'status',
        'reality_cost'
    ];
}
