<?php

namespace App\Http\Controllers;
use DataTables;
use App\DataTables\UserDataTable;
use App\User;
use Illuminate\Http\Request;

class YAjraDataTableController extends Controller
{
    // public function showtable(UserDataTable $datatable)
    // {
        
    //     return $datatable->render('YajraDatatables');
    // }



    public function showtable(Request $request)
    {
        if($request->ajax())
        {
            $users = User::select('id', 'name', 'email', 'created_at', 'updated_at')->get();

            return DataTables::of($users)
            
                ->addColumn('created_at', function($row) {

                    return '<span>' . date_format(date_create($row->created_At), 'm/d/Y h:i a') . '</span>';
                    
                })

                ->addColumn('action', function($row){

                    

                    return '<span><button type="button" name="edit" id="'. $row->id .'" class =" edit btn btn-primary btn-sm">Edit</button> 
                    <button type="button" name="Delete" id="'. $row->id .'" class =" delete btn btn-danger btn-sm">Delete</button></span>';

                })

                ->rawColumns(['created_at', 'action'])
                ->make(true);
        }
        
        return view('YajraDatatables');
        
       
    }




    
}
