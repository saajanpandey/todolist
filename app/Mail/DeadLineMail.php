<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class DeadLineMail extends Mailable
{
    use Queueable, SerializesModels;
    public $deadLineEmail;
    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($deadLineEmail)
    {
        $this->deadLineEmail = $deadLineEmail;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->subject('This is Task Deadline Email')->view('email.test2');
    }
}
