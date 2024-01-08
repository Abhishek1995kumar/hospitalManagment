<?php

namespace App\Http\Controllers;
use Auth;
use App\Models\Leave;
use Illuminate\Http\Request;
use DB;


class LeaveController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $user = Auth::user();
        $id = Auth::id();

        $name = DB::table('users')
                ->select('first_name','last_name')
                ->where('id','=',$id)
                ->first();

        // echo "<pre></br>";
        // print_r($name);
        // print_r($id); die();
        $leave = Leave::all();
        return view ('leave.index')->with('leave', $leave);

    }

    public function allow_leave()
    {
        // $leave = Leave::all();
        $leave = DB::table('leave')
            ->select('*')
            ->where('status','!=','Reject')
            ->where('status','!=','Accept')
            ->get();
        return view ('leave.allow')->with('leave', $leave);
     }

    public function create()
    {
        return view('leave.create');
    }


    public function store(Request $request)
    {
       
        
        $input = $request->all();
        Leave::create($input);
        return redirect('leave')->with('flash_message', 'data Addedd!');  
       
       
    }

    public function update_statuss(Request $request )
    {
        $input = $request->input('status');
        $id = $request->input('id');
       
       DB::table('leave')
            ->where('id', '=',  $id)
            ->update([
            'status' => $input
         ]);
        return redirect('leave')->with('flash_message','Contact Updated!'); 
     }
}
