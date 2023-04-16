<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class BookingTourMail extends Mailable
{
    use Queueable, SerializesModels;

    private $loginUrl;
    private $params;
    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($loginUrl, $params)
    {
        $this->loginUrl = $loginUrl;
        $this->params = $params;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->subject('Confirm booking tour')
            ->view('mail-template.test')
            ->with([
                'url' => $this->loginUrl,
                'params' => $this->params
            ]);
    }
}
