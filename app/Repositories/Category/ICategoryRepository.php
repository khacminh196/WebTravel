<?php

declare(strict_types=1);

namespace App\Repositories\Category;

use App\Repositories\IBaseRepository;

interface ICategoryRepository extends IBaseRepository
{
    public function getListCategory();
}