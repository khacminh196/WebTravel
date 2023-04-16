<?php

namespace App\Http\Controllers\Admin;

use App\Enums\Constant;
use App\Http\Controllers\Controller;
use App\Services\BookingService;
use Carbon\Carbon;
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
        $credentials = [
            'status' => $request->status
        ];

        if ($credentials['status'] == array_flip(Constant::TOUR_STATUS)['Approved']) {
            $credentials['time_token_expired'] = Carbon::now();
            $credentials['user_type_confirm'] = Constant::USER_TYPE_CONFIRM['ADMIN'];
            $credentials['confirm'] = Constant::BOOKING_TOUR_CONFIRM['CONFIRMED'];
        }

        $this->bookingService->update($id, $credentials);

        return redirect()->back();
    }

    public function detail($id)
    {
        $detail = $this->bookingService->bookingTourDetail($id);

        return view('admin.booking.detail', compact('detail'));
    }
}
