<?php

namespace App\Http\Controllers;

use App\Enums\Constant;
use App\Repositories\Blog\IBlogRepository;
use App\Repositories\Country\ICountryRepository;
use App\Repositories\Tour\ITourRepository;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    protected $tourRepo;
    protected $countryRepo;
    protected $blogRepo;

    public function __construct(
        ITourRepository $tourRepo,
        ICountryRepository $countryRepo,
        IBlogRepository $blogRepo
    )
    {
        $this->tourRepo = $tourRepo;
        $this->countryRepo = $countryRepo;
        $this->blogRepo = $blogRepo;
    }

    public function index()
    {
        $data = $this->tourRepo->getListTour([], true);
        $countries = $this->countryRepo->getListCountry();
        $blogs = $this->blogRepo->select(['id', 'title', 'created_at', 'image_link'])->where([
            ['language', Constant::LANGUAGE[config('app.locale')]],
            ['is_public', Constant::DISPLAY['SHOW']]
        ])->orderBy('id', 'DESC')->limit(3)->get();
        return view('home.index', compact('data', 'countries', 'blogs'));
    }
}
