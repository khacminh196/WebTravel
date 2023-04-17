<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Repositories\Country\ICountryRepository;
use App\Repositories\Traffic\ITrafficRepository;
use App\Services\ImageService;
use App\Services\S3Service;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;

class ManagerController extends Controller
{
    protected $imageService;
    protected $countryRepo;
    protected $trafficRepo;
    protected $s3Service;

    public function __construct(
        ImageService $imageService,
        ICountryRepository $countryRepo,
        ITrafficRepository $trafficRepo,
        S3Service $s3Service
    )
    {
        $this->imageService = $imageService;
        $this->countryRepo = $countryRepo;
        $this->trafficRepo = $trafficRepo;
        $this->s3Service = $s3Service;
    }

    public function index()
    {
        $countries = $this->countryRepo->getListCountry(true);

        return view('admin.manager.country.index', compact('countries'));
    }

    public function createCountry()
    {
        return view('admin.manager.country.create');
    }

    public function storeCountry(Request $request)
    {
        $params = $request->all();
        DB::beginTransaction();
        try {
            $link = $this->s3Service->uploadFileToS3($request->file('image'), 'countries/');
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

        return redirect()->route('admin.manager.country.index');
    }

    public function changeCountryStatus($id, $status)
    {
        $update = $this->countryRepo->where([['id', $id]])->update(['display' => $status]);

        if ($update) {
            Session::flash("dataSuccess", [
                "msg" => trans('messages.UPDATE_SUCCESS')
            ]);
        }

        return redirect()->back();
    }

    public function trafficIndex(Request $request)
    {
        $params = $request->only('start_date', 'end_date');
        $data = $this->trafficRepo->getTraffic($params);

        return view('admin.manager.traffic.index', compact('data'));
    }
}
