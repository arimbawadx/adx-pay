<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class sendEmailCustomers extends Mailable
{
    use Queueable, SerializesModels;

    public $emailDataLogin;
    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($emailDataLogin)
    {
        $this->emailDataLogin = $emailDataLogin;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->subject('Data Login Customer')
                    ->view('emails.sendEmailCustomers');
    }
}
