<?php

declare(strict_types=1);

namespace App\Repositories\TourPrefecture;

use App\Enums\Constant;
use App\Models\TourPrefecture;
use App\Repositories\BaseRepository;

class TourPrefectureRepository extends BaseRepository implements ITourPrefectureRepository
{
    /**
     * Get model
     * @return string
     */
    public function getModel()
    {
        return TourPrefecture::class;
    }
}