<?php

namespace App\Http\Controllers;
// namespace App\Mail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use App\Mail\welcomeNewUserMail;
use App\Events\MailHasSentEvent;
use App\Mail\UserRequest;

class Usercontroller extends Controller
{
    public function viewuserform()
    {
        return view('insertuser');
    }
    public function insert(Request $req)
    {

        event(new MailHasSentEvent($req));
         $email=$req->input('email');
        
         
        echo "Email Has Been Sent";
    }
}
