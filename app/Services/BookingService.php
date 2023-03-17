<?php
declare(strict_types=1);

namespace App\Services;

use App\Enums\Constant;
use App\Mail\BookingTourMail;
use App\Repositories\BookingTour\IBookingTourRepository;
use App\Repositories\User\IUserRepository;
use Carbon\Carbon;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Str;

class BookingService
{
    protected $bookingRepo;
    protected $userRepo;

    public function __construct(
        IBookingTourRepository $bookingRepo,
        IUserRepository $userRepo
    )
    {
        $this->bookingRepo = $bookingRepo;
        $this->userRepo = $userRepo;
    }

    public function createBookingTour($credentials)
    {
        $hasAccount = true;
        $user = $this->userRepo->where([['email', $credentials['name']], ['is_deleted', Constant::IS_NOT_DELETED]])->first();
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
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ];
        $this->bookingRepo->create($dataInsert);

        $data = [
            'email' => $credentials['email'],
            'phone' => $credentials['phone'],
            'number_of_people' => $credentials['number_of_people'],
            'expected_travel_time' => Carbon::parse($credentials['expected_travel_time'])->format('d-m-Y'),
            'expected_travel_hotel' => $credentials['expected_travel_hotel'] ?? null,
        ];
        if (!$hasAccount) {
            $data['password'] = $passwordRandom;
        }

        return $data;
    }

    public function getListBookingAdmin($params)
    {
        return $this->bookingRepo->getListBookingAdmin($params);
    }

    public function updateStatus($id, $status)
    {
        return $this->bookingRepo->where([['id', $id]])->update(['status' => $status]);
    }

    public function bookingTourDetail($id)
    {
        return $this->bookingRepo->where([['id', $id]])->first();
    }
}