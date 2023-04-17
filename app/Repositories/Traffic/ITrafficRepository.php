<?php

declare(strict_types=1);

namespace App\Repositories\Traffic;

use App\Repositories\IBaseRepository;

interface ITrafficRepository extends IBaseRepository
{
    public function getTraffic($params = []);
}