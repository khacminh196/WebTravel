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

    public function index()
    {
        $data = $this->tourService->getAllTour();
        return view('admin.tour.index', compact('data'));
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

            return redirect()->back();
        } catch (\Exception $e) {
            DB::rollBack();
            return "Error";
        }
    }

    public function edit()
    {
        dd("edit");
    }

    public function update()
    {
        dd("update");
    }
}
