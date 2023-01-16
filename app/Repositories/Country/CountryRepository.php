<?php

declare(strict_types=1);

namespace App\Repositories\Country;

use App\Enums\Constant;
use App\Models\Country;
use App\Repositories\BaseRepository;

class CountryRepository extends BaseRepository implements ICountryRepository
{
    /**
     * Get model
     * @return string
     */
    public function getModel()
    {
        return Country::class;
    }
}