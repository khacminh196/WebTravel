<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\CreateTourRequest;
use App\Repositories\Country\ICountryRepository;
use App\Services\TourService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class TourController extends Controller
{
    protected $tourService;
    protected $countryRepo;

    public function __construct(
        TourService $tourService,
        ICountryRepository $countryRepo
    )
    {
        $this->tourService = $tourService;
        $this->countryRepo = $countryRepo;
    }

    public function index(Request $request)
    {
        $params = $request->all();
        $data = $this->tourService->getAllTourAdmin($params);
        $countries = $this->countryRepo->where([['display', 1]])->get();
        return view('admin.tour.index', compact('data', 'countries'));
    }

    public function create()
    {
        $countries = $this->countryRepo->all();
        return view('admin.tour.create', compact('countries'));
    }

    public function store(CreateTourRequest $request)
    {
        $params = $request->all();
        DB::beginTransaction();
        try {
            $this->tourService->store($params);
            DB::commit();

            return redirect()->route('admin.tour.index');
        } catch (\Exception $e) {
            DB::rollBack();
            return "Error";
        }
    }

    public function edit($id)
    {
        $data = $this->tourService->getTourDetail($id);
        $countries = $this->countryRepo->all();
        $prefectures = $data->prefectures->pluck('id');

        return view('admin.tour.edit', compact('data', 'countries', 'prefectures'));
    }

    public function update($id, Request $request)
    {
        $params = $request->all();
        if ($request->image_remove) {
            $params['image_remove'] = explode(',', $request->image_remove);
        }
        DB::beginTransaction();
        try {
            $this->tourService->update($id, $params);
            DB::commit();
        } catch (\Exception $e) {
            DB::rollBack();
            dd($e);
        }

        return redirect()->back();
    }
}
