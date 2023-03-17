<?php
declare(strict_types=1);

namespace App\Services;

use App\Mail\BookingTourMail;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Storage;

class MailService
{
    public function __construct()
    {
    }

    public function sendMailBookingTour($params)
    {
        $loginUrl = config('auth.domain') . config('auth.login_url');
        return Mail::to($params['email'])->queue(new BookingTourMail($loginUrl, $params));
    }
}