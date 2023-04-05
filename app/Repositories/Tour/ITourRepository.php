<?php

declare(strict_types=1);

namespace App\Repositories\Tour;

use App\Repositories\IBaseRepository;

interface ITourRepository extends IBaseRepository
{
    public function getListTour($params, $homeScreen = false, $isAdmin = false);
    public function getTourDetail($id, $isAdmin = false);
}