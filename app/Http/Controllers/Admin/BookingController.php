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
    
    public function index()
    {
        $data = $this->bookingService->getListBookingAdmin();
   
        return view('admin.booking.index', compact('data'));
    }
}
