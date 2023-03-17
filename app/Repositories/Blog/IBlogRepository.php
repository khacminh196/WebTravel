<?php

declare(strict_types=1);

namespace App\Repositories\Blog;

use App\Repositories\IBaseRepository;

interface IBlogRepository extends IBaseRepository
{
    public function getListBlog($params, $isAdmin = false);
}