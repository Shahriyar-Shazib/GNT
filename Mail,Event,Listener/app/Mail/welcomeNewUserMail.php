<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class welcomeNewUserMail extends Mailable
{
    use Queueable, SerializesModels;

    public $details;

    public function __construct()
    {
        
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        // return $this->markdown('emails.new-welcome');
        return $this->subject('Mail from Surfside Media')->view('Insertuser');
    }
}
