<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Attendance;
use App\Models\User;
use DB;
use Carbon\Carbon;
use Auth;




class Attendancecontroller extends Controller
{
    
    public function index(Request $request)
    {
        $user2 = User::all(); 
    
       $pharama = DB::table('attendance')
        ->select( 'attendance.*','custo.first_name','custo.last_name') 
        ->leftjoin('users as custo', 'attendance.emp', '=', 'custo.id')
        ->get();
       

       
      
        return view('attendance.index',compact('user2','pharama'));  
    }


    public function create()
    {
        $user2 = User::all(); 
        return view('attendance.create',compact('user2'));
    }


    public function store(Request $request)
    {
        $input = $request->all();
        $s_time = $request['shift_start'];
        $e_time = $request['shift_end'];
        $timestamp1 = strtotime($s_time);
        $timestamp2 = strtotime($e_time);
        $hours = abs($timestamp2 - $timestamp1);
        $time = date('H:i',$hours);
       
        $input['total_duty_hours'] = $time;

        $t_time = $request['tea_break'];
        $te_time = $request['tea_break_out'];
        $timestamp3 = strtotime($t_time);
        $timestamp4 = strtotime($te_time);
        $hours1 = abs($timestamp4 - $timestamp3);
        $time2 = date('H:i',$hours1);
        $input['total_tea_break'] = $time2;
     

        $l_time = $request['lunch_break'];
        $le_time = $request['lunch_break_out'];
        $timestamp5 = strtotime($l_time);
        $timestamp6 = strtotime($le_time);
        $hours2 = abs($timestamp6 - $timestamp5);
        $time3 = date('H:i',$hours2);
        $input['total_lunch_break'] = $time3;
        
    

        $m_time = $request['meeting_break'];
        $me_time = $request['meeting_break_out'];
        $timestamp7 = strtotime($m_time);
        $timestamp8 = strtotime($me_time);
        $hours3 = abs($timestamp8 - $timestamp7);
        $time4 = date('H:i',$hours3);
        $input['total_meeting_break'] = $time4;
        
        
        Attendance::create($input);
        
        return redirect('attendance')->with('flash_message', 'Contact Addedd!'); 
    }

    
    public function edit($id)
    {
        $user2 = User::all(); 
        
        $attendance= Attendance::find($id);
     
        return view('attendance.edit',compact('attendance','user2'));
    }

    public function edit_form($id)
    {
        $attendance = Attendance::find($id);
        return view('attendance.edit')->with('attendance', $attendance);
    }

    
    public function update(Request $request, $id)
    {
        $attendance = Attendance::find($id);
        $input = $request->all();
        $attendance->update($input);
        return redirect('attendance')->with('flash_message', 'attendance Updated!');  
    }

    function delete_data(Request $request)
    {
        if($request->ajax())
        {
            DB::table('attendance')
                ->where('id', $request->id)
                ->delete();
            echo '<div class="alert alert-success">Data Deleted</div>';
        }
    }

    


    public function destroy($id)
    {
        Attendance::destroy($id);
        return redirect('attendance')->with('flash_message', 'Contact deleted!');
    }

    function list()
    {
     $user2 = User::all(); 
     return view('attendance.list')->with('user2',$user2);
    

    }

    function fetch_data(Request $request)
   
    {

      
     if($request->ajax())
     {
      if($request->from_date != '' && $request->to_date != '' && $request->employe != '' )
      {
         $data = DB::table('attendance')
        ->select('attendance.*','users.first_name','users.last_name')
        ->leftJoin('users','attendance.emp','users.id')
        ->whereBetween('attendance.date', array($request->from_date, $request->to_date))
        ->where('attendance.emp',$request->employe)
         ->get();


      }
      else
      {
       $data = DB::table('attendance')->orderBy('attendance.date', 'desc')
       ->select('attendance.*','users.first_name','users.last_name','attendance.shift_start')
       ->leftJoin('users','attendance.emp','users.id')
       ->get();

      }
      echo json_encode($data);
     }
    }

    // start code ujwala//
    function fetch_data2(Request $request)
    {
       
     if($request->ajax())
     
     {
        if($request->employe != ''){
         $data = DB::table('attendance')
        ->select('attendance.*','users.first_name','users.last_name')
        ->leftJoin('users','attendance.emp','users.id')
        ->where('attendance.emp',$request->employe)
         ->get();

      }
      else
      {
       $data = DB::table('attendance')->orderBy('attendance.date', 'desc')
       ->select('attendance.*','users.first_name','users.last_name','attendance.shift_start')
       ->leftJoin('users','attendance.emp','users.id')
       ->get();

      }
      echo json_encode($data);
     }
    }
    //code ujwala//



}


