<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class NewMail extends Mailable
{
    use Queueable, SerializesModels;
    public $taskEmail;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($taskEmail)
    {
    $this->taskEmail = $taskEmail;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->subject('This is Task Created Email')->view('email.test');
    }
}
