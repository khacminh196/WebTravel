<?php

declare(strict_types=1);

namespace App\Repositories\BookingTour;

use App\Enums\Constant;
use App\Models\BookingTour;
use App\Repositories\BaseRepository;

class BookingTourRepository extends BaseRepository implements IBookingTourRepository
{
    /**
     * Get model
     * @return string
     */
    public function getModel()
    {
        return BookingTour::class;
    }
}