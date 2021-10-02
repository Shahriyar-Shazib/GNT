<?php

namespace App\Http\Controllers;

use App\DataTables\UserDataTable;
use App\User;
use Illuminate\Http\Request;

class YAjraDataTableController extends Controller
{
    public function showtable(UserDataTable $datatable)
    {
        
        return $datatable->render('YajraDatatables');
    }
}
