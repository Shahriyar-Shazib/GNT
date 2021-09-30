<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;

class JsDataTableControlle0r extends Controller
{
    public function  viewTable()
    {
        $usrs=User::all();
       return view ('JsDataTable')->with('Uers',$usrs);
    }
}
