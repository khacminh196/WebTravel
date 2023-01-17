<?php

namespace App\Http\Controllers;

use App\Repositories\Tour\ITourRepository;
use Illuminate\Http\Request;

class TourController extends Controller
{
    protected $tourRepo;

    public function __construct(ITourRepository $tourRepo)
    {
        $this->tourRepo = $tourRepo;    
    }

    public function index(Request $request)
    {
        $params = $request->all();
        $data = $this->tourRepo->getListTour($params);

        return view('destination.index', compact('data'));
    }
}
