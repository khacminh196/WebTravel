<?php
declare(strict_types=1);

namespace App\Services;

use App\Enums\Constant;
use App\Mail\BookingTourMail;
use App\Repositories\BookingTour\IBookingTourRepository;
use App\Repositories\Tour\ITourRepository;
use App\Repositories\User\IUserRepository;
use Carbon\Carbon;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Str;

class BookingService
{
    protected $bookingRepo;
    protected $userRepo;
    protected $tourRepo;

    public function __construct(
        IBookingTourRepository $bookingRepo,
        IUserRepository $userRepo,
        ITourRepository $tourRepo
    )
    {
        $this->bookingRepo = $bookingRepo;
        $this->userRepo = $userRepo;
        $this->tourRepo = $tourRepo;
    }

    public function createBookingTour($credentials)
    {
        $hasAccount = true;
        $user = $this->userRepo->where([['email', $credentials['name']], ['is_deleted', Constant::IS_NOT_DELETED]])->first();
        $token = Str::random(40);
        if (!$user) {
            $hasAccount = false;
            $passwordRandom = Str::random(8);
            $user = $this->userRepo->create([
                'name' => $credentials['name'],
                'email' => $credentials['email'],
                'password' => bcrypt($passwordRandom),
            ]);
        }
        $dataInsert = [
            'type_booking' => isset($credentials['tour_id']) && $credentials['tour_id'] ? Constant::TYPE_BOOKING_TOUR['EXISTS'] : Constant::TYPE_BOOKING_TOUR['CUSTOM'],
            'tour_id' => $credentials['tour_id'] ?? null,
            'user_id' => $user->id,
            'name' => $credentials['name'],
            'phone' => $credentials['phone'],
            'email' => $credentials['email'],
            'number_of_people' => $credentials['number_of_people'],
            'expected_travel_time' => $credentials['expected_travel_time'],
            'expected_travel_hotel' => $credentials['expected_travel_hotel'] ?? null,
            'note' => $credentials['note'],
            'token_confirm' => $token,
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ];
        $bookingTour = $this->bookingRepo->create($dataInsert);
        if ($bookingTour->type_booking == Constant::TYPE_BOOKING_TOUR['EXISTS']) {
            $tour = $this->tourRepo->select(['name'])->where('id', $bookingTour->tour_id)->first();
        }
        $data = [
            'id' => $bookingTour->id,
            'type_booking' => $bookingTour->type_booking,
            'tour_id' => $tour->name ?? null,
            'tour_name' => $tour->name ?? null,
            'name' => $credentials['name'],
            'email' => $credentials['email'],
            'phone' => $credentials['phone'],
            'number_of_people' => $credentials['number_of_people'],
            'expected_travel_time' => Carbon::parse($credentials['expected_travel_time'])->format('d-m-Y'),
            'expected_travel_hotel' => $credentials['expected_travel_hotel'] ?? null,
            'token' => $token
        ];
        if (!$hasAccount) {
            $data['password'] = $passwordRandom;
        }

        return $data;
    }

    public function confirmBookingTour($id, $token)
    {
        $response = [];

        $bookingTour = $this->bookingRepo->where([
            ['id', $id],
            ['token_confirm', $token]
        ])->orderBy('id', 'DESC')->first();

        if (!$bookingTour) {
            $response = [
                'error' => true,
                'message' => 'Not found'
            ];
        } else if (
            $bookingTour->confirm == Constant::BOOKING_TOUR_CONFIRM['CONFIRMED']
        ) {
            $response = [
                'error' => true,
                'message' => 'Booking has confirmed'
            ];
        } else {
            $bookingTour->time_token_expired = Carbon::now();
            $bookingTour->user_type_confirm = Constant::USER_TYPE_CONFIRM['USER'];
            $bookingTour->confirm = Constant::BOOKING_TOUR_CONFIRM['CONFIRMED'];
            $bookingTour->save();
            $response = [
                'error' => false,
                'message' => 'Confirmed booking success',
            ];
        }

        return $response;
    }

    public function getListBookingAdmin($params)
    {
        return $this->bookingRepo->getListBookingAdmin($params);
    }

    public function update($id, $credentials)
    {
        return $this->bookingRepo->where([['id', $id]])->update($credentials);
    }

    public function bookingTourDetail($id)
    {
        return $this->bookingRepo->where([['id', $id]])->with('tour')->first();
    }

    public function checkConfirmBooking($id, $token)
    {
        return $this->getBookingTour($id, $token)->orderBy('id', 'DESC')->first();
    }

    public function updateBookingTour($id, $token, $credentials)
    {
        $credentials['time_token_expired'] = Carbon::now();
        $credentials['user_type_confirm'] = Constant::USER_TYPE_CONFIRM['USER'];
        $credentials['confirm'] = Constant::BOOKING_TOUR_CONFIRM['CONFIRMED'];
        return $this->getBookingTour($id, $token)->update($credentials);
    }

    private function getBookingTour($id, $token)
    {
        return $this->bookingRepo->where([
            ['id', $id],
            ['token_confirm', $token],
            ['confirm', Constant::BOOKING_TOUR_CONFIRM['UNCONFIRMED']]
        ])->whereNull('time_token_expired');
    }
}