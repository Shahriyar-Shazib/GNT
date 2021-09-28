<?php

namespace App\Listeners;

use App\Events\MailHasSentEvent;
// use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Support\Facades\Mail;
use App\Mail\welcomeNewUserMail;

use App\Mail\UserRequest;
use Illuminate\Contracts\Queue\ShouldQueue;

class sendMailListner  implements ShouldQueue
{

    public function handle(MailHasSentEvent $event)
    {
        // dump($event->ab);
        Mail::to($event->ab)->send(new welcomeNewUserMail());
        // dump();
       
        
    }
}
