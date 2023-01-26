<?php

declare(strict_types=1);

namespace App\Repositories\Country;

use App\Enums\Constant;
use App\Models\Country;
use App\Repositories\BaseRepository;
use Illuminate\Support\Facades\DB;

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

    public function getListCountryAndNumberTour()
    {
        return $this->model->select(
                'id',
                'name',
                'image_link',
                DB::raw("(SELECT COUNT(*) FROM tours t WHERE t.country_id = countries.id) number_of_tour")
            )
            ->where(['display' => Constant::DISPLAY['SHOW']])
            ->get();
    }
}