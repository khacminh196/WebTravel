<?php

namespace App\Http\Controllers;

use App\Enums\Constant;
use App\Http\Controllers\Controller;
use App\Http\Requests\ListBlogRequest;
use App\Repositories\Blog\IBlogRepository;
use App\Repositories\Category\ICategoryRepository;
use Illuminate\Http\Request;

class BlogController extends Controller
{
    protected $blogRepo;
    protected $categoryRepo;
    public function __construct(IBlogRepository $blogRepo, ICategoryRepository $categoryRepo)
    {
        $this->blogRepo = $blogRepo;
        $this->categoryRepo = $categoryRepo;
    }

    public function index(ListBlogRequest $request)
    {
        $params = $request->validated();
        $data = $this->blogRepo->getListBlog($params);
        return view('blog.index', compact('data'));
    }

    public function show($id)
    {
        $categories = [];
        $recentBlog = $this->blogRepo->select(['id', 'title', 'image_link', 'created_at'])->orderBy('id', 'DESC')->limit(3)->get();
        $categories = $this->categoryRepo->getListCategory();
        $data = $this->blogRepo->find($id);
        
        return view('blog.detail', compact('data', 'categories', 'recentBlog', 'categories'));
    }
}
