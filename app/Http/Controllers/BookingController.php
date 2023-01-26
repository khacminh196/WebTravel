<?php

namespace App\Http\Controllers;

use App\Http\Requests\BookingTourRequest;
use App\Services\BookingService;
use App\Services\MailService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
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

    public function bookingTour(BookingTourRequest $request)
    {
        $credentials = $request->validated();
        DB::beginTransaction();
        try {
            $bookingInfo = $this->bookingService->createBookingTour($credentials);
            $this->mailService->sendMailBookingTour($bookingInfo);
            DB::commit();
            Session::flash("dataSuccess", [
                "msg" => trans('messages.BOOKING_SUCCESS')
            ]);
        } catch (\Exception $e) {
            DB::rollBack();
            Session::flash("dataError", [
                "msg" => trans('messages.SERVER_ERROR')
            ]);
        }
        
        return redirect()->back();
    }
}
