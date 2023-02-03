<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Services\BookingService;
use Illuminate\Http\Request;

class BookingController extends Controller
{
    protected $bookingService;

    public function __construct(BookingService $bookingService)
    {
        $this->bookingService = $bookingService;
    }
    
    public function index(Request $request)
    {
        $params = $request->all();
        $data = $this->bookingService->getListBookingAdmin($params);
   
        return view('admin.booking.index', compact('data'));
    }

    public function updateStatusTravel($id, Request $request)
    {
        $status = $request->status;
        $this->bookingService->updateStatus($id, $status);

        return redirect()->back();
    }
}
