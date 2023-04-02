<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Repositories\Country\ICountryRepository;
use App\Services\ImageService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;

class ManagerController extends Controller
{
    protected $imageService;
    protected $countryRepo;

    public function __construct(
        ImageService $imageService,
        ICountryRepository $countryRepo
    )
    {
        $this->imageService = $imageService;
        $this->countryRepo = $countryRepo;
    }

    public function index()
    {
        $countries = $this->countryRepo->getListCountry(true);

        return view('admin.manager.index', compact('countries'));
    }

    public function createCountry()
    {
        return view('admin.manager.create-country');
    }

    public function storeCountry(Request $request)
    {
        $params = $request->all();
        DB::beginTransaction();
        try {
            $link = $this->imageService->upload($request->file('image'), 'images/countries');
            $params['image_link'] = $link;
            $this->countryRepo->create($params);
            DB::commit();
            Session::flash("dataSuccess", [
                "msg" => trans('messages.CREATE_SUCCESS')
            ]);
        } catch (\Exception $e) {
            DB::rollBack();
            Session::flash("dataError", [
                "msg" => trans('messages.SERVER_ERROR')
            ]);
        }

        return redirect()->route('admin.manager.index');
    }
}
