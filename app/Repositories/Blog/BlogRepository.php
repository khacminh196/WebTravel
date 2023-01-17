<?php

declare(strict_types=1);

namespace App\Repositories\Blog;

use App\Enums\Constant;
use App\Models\Blog;
use App\Repositories\BaseRepository;

class BlogRepository extends BaseRepository implements IBlogRepository
{
    /**
     * Get model
     * @return string
     */
    public function getModel()
    {
        return Blog::class;
    }

    public function getListBlog($params)
    {
        $data = $this->model->select(
            'id',
            'title',
            'description',
            'image_link',
            'created_at'
        )->when(isset($params['category_id']), function ($query) use ($params) {
            return $query->where('category_id', $params['category_id']);
        })->when(isset($params['title']), function ($query) use ($params) {
            return $query->where(function ($q) use ($params) {
                $q->where('title', 'LIKE', '%' . $params['title'] . '%')
                    ->orWhere('description', 'LIKE', '%' . $params['title'] . '%');
            });
        });
        
        return $data->with('category')->orderBy('id', 'DESC')->paginate(Constant::DEFAULT_PAGINATION_BLOG);
    }
}