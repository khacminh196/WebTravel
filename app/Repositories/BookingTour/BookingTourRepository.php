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

    public function getListBookingAdmin($params)
    {
        $query = $this->model->when(isset($params['type_booking']) && $params['type_booking'], function ($query) use ($params) {
                return $query->where('type_booking', $params['type_booking']);
            })
            ->when(isset($params['status']) && $params['status'], function ($query) use ($params) {
                return $query->where('status', $params['status']);
            })
            ->when(isset($params['name']) && $params['name'], function ($query) use ($params) {
                return $query->where('name', 'LIKE', '%' . $params['name'] . '%');
            });

        return $query->orderBy('created_at', 'DESC')->paginate(Constant::DEFAULT_PAGINATION_ADMIN);
    }
}