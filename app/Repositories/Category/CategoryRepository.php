<?php

declare(strict_types=1);

namespace App\Repositories\Category;

use App\Models\Category;
use App\Repositories\BaseRepository;
use Illuminate\Support\Facades\DB;

class CategoryRepository extends BaseRepository implements ICategoryRepository
{
    /**
     * Get model
     * @return string
     */
    public function getModel()
    {
        return Category::class;
    }

    public function getListCategory()
    {
        return $this->model->select(
            'id',
            'name',
            DB::raw("(SELECT count(*) FROM blogs WHERE category_id = categories.id) as num_of_blogs")
        )->get();
    }
}