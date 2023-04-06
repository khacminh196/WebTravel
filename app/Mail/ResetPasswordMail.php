<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class ResetPasswordMail extends Mailable
{
    use Queueable, SerializesModels;

    private $resetUrl;
    private $token;
    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($resetUrl, $token)
    {
        $this->resetUrl = $resetUrl;
        $this->token = $token;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->subject('Reset password')
            ->view('mail-template.reset-password')
            ->with([
                'url' => $this->resetUrl,
                'token' => $this->token
            ]);
    }
}
