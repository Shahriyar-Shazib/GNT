<?php

namespace App\Http\Controllers;

use App\Imports\UserImport;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;

class UsersImportController extends Controller
{
    public function show()
    {
        return view('Import');
    }
    public function store(Request $req)
    {
        $path1 = $req->file('file')->store('temp'); 
        $path=storage_path('app').'/'.$path1;  
        Excel::import(new UserImport,$path);
        // $file =$req->file('file');
        // Excel::import(new UserImport,$file );
        echo('upload successfully');
    }
}
