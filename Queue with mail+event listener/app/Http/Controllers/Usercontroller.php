<?php

namespace App\Http\Controllers;
// namespace App\Mail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use App\Mail\welcomeNewUserMail;
use App\Events\MailHasSentEvent;
use App\Mail\UserRequest;
use App\scoreboardModel;

class Usercontroller extends Controller
{
    public function viewuserform()
    {
        //dd('1230');
        // $res=scoreboardModel::all();
        // return $res;
        //print_r($res);
        return view('insertuser');
    }
    public function insert(Request $req)
    {
       
           $userEmail=$req->input('email'); 
         event(new MailHasSentEvent($userEmail));
     
        // return redirect('/newuser');
        
        
    }
}
