<?php

namespace App\Http\Controllers;

use App\Enums\Constant;
use App\Http\Requests\BookingTourRequest;
use App\Jobs\SendMail;
use App\Services\BookingService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;

class BookingController extends Controller
{
    protected $bookingService;
    public function __construct(
        BookingService $bookingService
    )
    {
        $this->bookingService = $bookingService;
    }

    public function bookingTour(BookingTourRequest $request)
    {
        $credentials = $request->validated();
        DB::beginTransaction();
        try {
            $bookingInfo = $this->bookingService->createBookingTour($credentials);
            // $this->mailService->sendMailBookingTour($bookingInfo);
            SendMail::dispatch(Constant::SEND_MAIL_TYPE['BOOKING_TOUR'], $bookingInfo);
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
