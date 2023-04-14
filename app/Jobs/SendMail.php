<?php

namespace App\Jobs;

use App\Enums\Constant;
use App\Services\MailService;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;

class SendMail implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    private $type;
    private $params;

    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct(
        $type,
        $params
    )
    {
        $this->type = $type;
        $this->params = $params;
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        $mailService = new MailService();
        if ($this->type == Constant::SEND_MAIL_TYPE['RESET_PASSWORD']) {
            $mailService->sendMailResetPassword($this->params['email-reset']);
        } else if ($this->type == Constant::SEND_MAIL_TYPE['BOOKING_TOUR']) {
            $mailService->sendMailBookingTour($this->params);
        }
    }
}
