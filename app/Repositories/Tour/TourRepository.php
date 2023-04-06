<?php

declare(strict_types=1);

namespace App\Repositories\Tour;

use App\Enums\Constant;
use App\Models\Tour;
use App\Repositories\BaseRepository;
use Illuminate\Support\Facades\DB;

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

    public function getListTour($params, $homeScreen = false, $isAdmin = false)
    {
        $query = $this->model->with('country')
            ->when(isset($params['country']) && $params['country'], function ($query) use ($params) {
                return $query->where('country_id', $params['country']);
            })
            // ->when(isset($params['prefecture']) && $params['prefecture'], function ($query) use ($params) {
            //     return $query->whereHas('prefectures', function ($q) use ($params) {
            //         $q->where('prefectures.id', $params["prefecture"]);
            //     });
            // })
            ->when(isset($params['keyword']) && $params['keyword'], function ($query) use ($params) {
                return $query->where('name', 'LIKE', '%' . $params['keyword'] . '%');
            })
            ->when(isset($params['sort-day']) && $params['sort-day'], function ($query) use ($params) {
                return $query->orderBy('num_of_day', $params['sort-day']);
            });

        if ($isAdmin) {
            $query = $query->select('*', DB::raw("(SELECT COUNT(*) FROM booking_tours b WHERE b.tour_id = tours.id) number_of_booking"));
        } else {
            $query = $query->whereHas('country', function ($q) {
                $q->where('display', Constant::DISPLAY['SHOW']);
            });
        }
        
        if ($homeScreen) {
            return $query->orderBy('id', 'DESC')->limit(6)->get();
        }

        return $query->paginate($isAdmin ? Constant::DEFAULT_PAGINATION_ADMIN :Constant::DEFAULT_PAGINATION_TOUR);
    }

    public function getTourDetail($id, $isAdmin = false)
    {
        if ($isAdmin) {
            return $this->model->with('images')->find($id);
        } else {
            return $this->model->with('images')->whereHas('country', function ($q) {
                $q->where('display', Constant::DISPLAY['SHOW']);
            })->find($id);
        }
    }
}