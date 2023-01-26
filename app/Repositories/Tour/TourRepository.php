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

    public function getListTour($params, $homeScreen = false)
    {
        $query = $this->model->with('country', 'prefectures')
            ->when(isset($params['country']) && $params['country'], function ($query) use ($params) {
                return $query->where('country_id', $params['country']);
            })
            ->when(isset($params['prefecture']) && $params['prefecture'], function ($query) use ($params) {
                return $query->whereHas('prefectures', function ($q) use ($params) {
                    $q->where('prefectures.id', $params["prefecture"]);
                });
            })
            ->when(isset($params['keyword']) && $params['keyword'], function ($query) use ($params) {
                return $query->where('name', 'LIKE', '%' . $params['keyword'] . '%');
            })
            ->when(isset($params['sort-day']) && $params['sort-day'], function ($query) use ($params) {
                return $query->orderBy('num_of_day', $params['sort-day']);
            });
        
        if ($homeScreen) {
            return $query->orderBy('id', 'DESC')->limit(6)->get();
        }

        return $query->paginate(Constant::DEFAULT_PAGINATION_TOUR);
    }

    public function getTourDetail($id)
    {
        return $this->model->with('images')->find($id);
    }
}