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

    public function getListBlog($params, $isAdmin = false)
    {
        $data = $this->model->select(
            'id',
            'language',
            'title',
            'category_id',
            'description',
            'image_link',
            'is_public',
            'created_at'
        )->when(isset($params['category_id']), function ($query) use ($params) {
            return $query->where('category_id', $params['category_id']);
        })->when(isset($params['title']), function ($query) use ($params) {
            return $query->where(function ($q) use ($params) {
                $q->where('title', 'LIKE', '%' . $params['title'] . '%')
                    ->orWhere('description', 'LIKE', '%' . $params['title'] . '%');
            });
        });

        if (!$isAdmin) {
            $data = $data->where('is_public', Constant::DISPLAY['SHOW'])
                ->where('language', Constant::LANGUAGE[config('app.locale')]);
        }
        
        return $data->with('category')->orderBy('id', 'DESC')->paginate($isAdmin ? Constant::DEFAULT_PAGINATION_ADMIN : Constant::DEFAULT_PAGINATION_BLOG);
    }
}