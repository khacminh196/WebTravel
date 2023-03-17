<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class BookingTour extends Model
{
    protected $fillable = [
        'type_booking',
        'tour_id',
        'user_id',
        'name',
        'phone',
        'email',
        'number_of_people',
        'expected_travel_time',
        'expected_travel_hotel',
        'note',
        'status',
        'reality_cost'
    ];
}
