<?php

namespace App\Http\Controllers;

use App\Enums\Constant;
use App\Repositories\Country\ICountryRepository;
use App\Repositories\Tour\ITourRepository;
use Illuminate\Http\Request;

class TourController extends Controller
{
    protected $tourRepo;
    protected $countryRepo;

    public function __construct(ITourRepository $tourRepo, ICountryRepository $countryRepo)
    {
        $this->tourRepo = $tourRepo;
        $this->countryRepo = $countryRepo;
    }

    public function index(Request $request)
    {
        $params = $request->all();
        $data = $this->tourRepo->getListTour($params);
        $countries = $this->countryRepo->where(['display' => Constant::DISPLAY['SHOW']])->get();

        return view('destination.index', compact('data', 'countries'));
    }

    public function show($id)
    {
        $data = $this->tourRepo->getTourDetail($id);

        return view('destination.detail', compact('data'));
    }
}
