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

    public function getListCountry($isAdmin = false)
    {
        $query = $this->model->select(
                'id',
                'code',
                'name',
                'display',
                'image_link',
            );

        if ($isAdmin) {
            return $query->paginate(Constant::DEFAULT_PAGINATION_ADMIN);
        }

        $language = Constant::LANGUAGE[config('app.locale')];

        return $query->addSelect(DB::raw("(SELECT COUNT(*) FROM tours t WHERE t.country_id = countries.id AND language = $language) number_of_tour"))
            ->where(['display' => Constant::DISPLAY['SHOW']])
            ->get();
    }
}