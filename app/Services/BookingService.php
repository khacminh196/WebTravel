<?php
declare(strict_types=1);

namespace App\Services;

use App\Enums\Constant;
use App\Mail\BookingTourMail;
use App\Repositories\BookingTour\IBookingTourRepository;
use App\Repositories\User\IUserRepository;
use Illuminate\Support\Facades\Mail;

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
        $user = $this->userRepo->where([['email', $credentials['name']], ['is_deleted', Constant::IS_NOT_DELETED]])->first();
        if (!$user) {
            $user = $this->userRepo->create($credentials);
        }
        dd($user);
        $this->bookingRepo->create($credentials);
        dd($user);
    }
}