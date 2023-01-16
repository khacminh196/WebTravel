<?php

declare(strict_types=1);

namespace App\Repositories\Tour;

use App\Enums\Constant;
use App\Models\Tour;
use App\Repositories\BaseRepository;

class TourRepository extends BaseRepository implements ITourRepository
{
    /**
     * Get model
     * @return string
     */
    public function getModel()
    {
        return Tour::class;
    }
}