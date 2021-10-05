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
        // dd($request);
        if($request->ajax())
        {
            $users = User::select('id', 'name', 'email','type', 'created_at', 'updated_at')->get();

            return DataTables::of($users)

                // ->addColumn('id', function($row) { 
    
                //     return '<span data-orig-value="'.$row->id.'" class="calculation" >' .$row->id. '</span>'; 
                    
                // })

                ->addColumn('created_at', function($row) {

                    return '<span>' . date_format(date_create($row->created_At), 'm/d/Y h:i a') . '</span>';
                    
                })

                ->addColumn('action', function($row){

                    return '<span><button type="button" name="edit"id="editbtn" data-id="'. $row->id .'" class ="edit btn btn-primary btn-sm">Edit</button> 
                    <button type="button" name="Delete" id="deletebtn" data-id="'. $row->id .'" class =" delete btn btn-danger btn-sm">Delete</button></span>';

                })

                ->rawColumns(['created_at', 'action','id'])
                ->make(true);
        }
        
        return view('YajraDatatables');
        
       
    }
    public function deleteUser($key)
    {
        $string=json_decode($key);
        error_log($string->key);
        if(strlen($string->key)>0){
            dd('hi');
            // User::find($string->key)->delete();
            // return redirect('/user-list'); 
        }
        else{
            // $result=Admin::where('accountstatus','Active')->get();
        }
    }

public function findUser()
{
    dd("hi");
    // $users = DB:: table('users')
    //                 ->where('type', '=', 100)
    //                 ->where('age', '>', 35)
    //                 ->get();
}



    
}
