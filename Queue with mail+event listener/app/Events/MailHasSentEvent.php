<?php

namespace App\Events;

use Illuminate\Http\Request;
use Illuminate\Broadcasting\Channel;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Broadcasting\PresenceChannel;
use Illuminate\Broadcasting\PrivateChannel;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Queue\SerializesModels;

class MailHasSentEvent
{
    use Dispatchable, InteractsWithSockets, SerializesModels;
    
public  $ab;
    
    public function __construct($req)
    {
        $this->ab=$req;
        // dump($this->ab);
    }


}
