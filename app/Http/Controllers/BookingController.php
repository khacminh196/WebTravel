<?php

namespace App\Http\Controllers;

use App\Services\BookingService;
use App\Services\MailService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class BookingController extends Controller
{
    protected $bookingService;
    protected $mailService;
    public function __construct(
        BookingService $bookingService,
        MailService $mailService
    )
    {
        $this->bookingService = $bookingService;
        $this->mailService = $mailService;
    }

    public function bookingTour(Request $request)
    {
        $credentials = $request->all();
        try {
            $this->bookingService->createBookingTour($credentials);
            $this->mailService->sendMailBookingTour();
            Session::flash("dataSuccess", [
                "msg" => trans('messages.BOOKING_SUCCESS')
            ]);
        } catch (\Exception $e) {
            dd($e);
        }
        
        return redirect()->back();
    }
}
