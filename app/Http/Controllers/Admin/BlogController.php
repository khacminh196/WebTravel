<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\CreateBlogRequest;
use App\Http\Requests\Admin\UpdateBlogRequest;
use App\Repositories\Blog\IBlogRepository;
use App\Repositories\Category\ICategoryRepository;
use App\Services\ImageService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;

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

    public function index(Request $request)
    {
        $data = $this->blogRepo->getListBlog($request->all(), true);
        $categories = $categories = $this->categoryRepo->all();

        return view('admin.blog.index', compact('data', 'categories'));
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

    public function update($id, UpdateBlogRequest $request)
    {
        $params = $request->all();
        try {
            if (isset($params['image']) && $params['image']) {
                $link = $this->imageService->upload($params['image']);
                $params['image_link'] = $link;
            }
            $this->blogRepo->update($id, $params);
            Session::flash("dataSuccess", [
                "msg" => trans('messages.UPDATE_SUCCESS')
            ]);
        } catch (\Exception $e) {
            Session::flash("dataError", [
                "msg" => trans('messages.SERVER_ERROR')
            ]);
        }
        return redirect()->route('admin.blog.index');
    }

    public function store(CreateBlogRequest $request)
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
            return $this->sendError();
        }
    }
}
