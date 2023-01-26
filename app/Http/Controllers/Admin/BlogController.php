<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Repositories\Blog\IBlogRepository;
use App\Repositories\Category\ICategoryRepository;
use App\Services\ImageService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class BlogController extends Controller
{
    protected $imageService;
    protected $blogRepo;
    protected $categoryRepo;
    public function __construct(ImageService $imageService, IBlogRepository $blogRepo, ICategoryRepository $categoryRepo)
    {
        $this->imageService = $imageService;
        $this->blogRepo = $blogRepo;
        $this->categoryRepo = $categoryRepo;
    }

    public function index()
    {
        $data = $this->blogRepo->all();
        return view('admin.blog.index', compact('data'));
    }

    public function create()
    {
        $categories = $this->categoryRepo->all();
        return view('admin.blog.create', compact('categories'));
    }

    public function edit($id)
    {
        $data = $this->blogRepo->find($id);

        return view('admin.blog.edit', compact('data'));
    }

    public function update($id, Request $request)
    {
        $params = $request->all();
        if (isset($params['image']) && $params['image']) {
            $link = $this->imageService->upload($params['image']);
            $params['image_link'] = $link;
        }
        $this->blogRepo->update($id, $params);
        return redirect()->route('admin.blog.index');
    }

    public function store(Request $request)
    {
        $params = $request->all();
        DB::beginTransaction();
        try {
            $link = $this->imageService->upload($request->file('image'));
            $params['image_link'] = $link;
            $this->blogRepo->create($params);
            DB::commit();
            
            return redirect()->route('admin.blog.index');
        } catch (\Exception $e) {
            DB::rollBack();
            dd($e);
            return $this->sendError();
        }
    }
}
