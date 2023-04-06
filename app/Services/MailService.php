<?php
declare(strict_types=1);

namespace App\Services;

use App\Mail\BookingTourMail;
use App\Mail\ResetPasswordMail;
use App\Models\PasswordReset;
use Carbon\Carbon;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Str;

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

    public function sendMailResetPassword($email)
    {
        $resetUrl = config('auth.domain') . config('auth.reset_url');
        $timeExists = Carbon::now()->addMinute(30);
        $token = Str::random(40);
        PasswordReset::create([
            'email' => $email,
            'token' => $token,
            'time_exists' => $timeExists,
            'created_at' => Carbon::now()
        ]);
        return Mail::to($email)->queue(new ResetPasswordMail($resetUrl, $token));
    }

    public function checkEmailReset($email)
    {
        return PasswordReset::where([
            ['email', $email],
            ['time_exists', '>=', Carbon::now()],
        ])->exists();
    }
}