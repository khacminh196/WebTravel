<?php

declare(strict_types=1);

namespace App\Repositories\TourImage;

use App\Enums\Constant;
use App\Models\TourImage;
use App\Repositories\BaseRepository;

class TourImageRepository extends BaseRepository implements ITourImageRepository
{
    /**
     * Get model
     * @return string
     */
    public function getModel()
    {
        return TourImage::class;
    }
}