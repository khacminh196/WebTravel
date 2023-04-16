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
            Session::flash("bookingSuccess", [
                "title" => "Đặt tour thành công!",
                "body" => "Cảm ơn bạn đã booking. Chúng tôi sẽ gửi thông tin đến địa chỉ email của bạn. Vui lòng kiểm tra email và xác nhận."
            ]);
        } catch (\Exception $e) {
            DB::rollBack();
            Session::flash("dataError", [
                "msg" => trans('messages.SERVER_ERROR')
            ]);
        }
        
        return redirect()->back();
    }

    public function confirmBookingTour($id, Request $request)
    {
        $token = $request->token;
        DB::beginTransaction();
        try {
            $response = $this->bookingService->confirmBookingTour($id, $token);
            DB::commit();
            if (!$response['error']) {
                Session::flash("bookingSuccess", [
                    "title" => "Xác nhận booking thành công",
                    "body" => "Cảm ơn bạn đã xác nhận việc booking tour, chúng tôi sẽ liên hệ với bạn trong thời gian sớm nhất"
                ]);
            } else {
                Session::flash("dataError", [
                    "msg" => $response['message']
                ]);
            }
        } catch (\Exception $e) {
            DB::rollBack();
            Session::flash("dataError", [
                "msg" => trans('messages.SERVER_ERROR')
            ]);
        }

        return redirect()->route('home.index');
    }

    public function editInfoBooking($id, Request $request)
    {
        $token = $request->token;
        $booking = $this->bookingService->checkConfirmBooking($id, $token);
        if ($booking) {
            return view('booking.edit', compact('booking'));
        }
        Session::flash("dataError", [
            "msg" => "Booking has confirmed"
        ]);
        
        return redirect()->route('home.index');
    }

    public function storeInfoBooking($id, Request $request)
    {
        $credentials = $request->only('phone', 'name', 'email', 'number_of_people', 'expected_travel_time', 'expected_travel_hotel', 'note');
        try {
            $this->bookingService->updateBookingTour($id, $request->token, $credentials);
            Session::flash("bookingSuccess", [
                "title" => "Xác nhận booking thành công",
                "body" => "Cảm ơn bạn đã xác nhận việc booking tour, chúng tôi sẽ liên hệ với bạn trong thời gian sớm nhất"
            ]);
        } catch (\Exception $e) {
            Session::flash("dataError", [
                "msg" => trans('messages.SERVER_ERROR')
            ]);
        }
        return redirect()->route('home.index');
    }
}
