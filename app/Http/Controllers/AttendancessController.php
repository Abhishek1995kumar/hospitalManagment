<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Attendancess;
use App\Models\User;
use DB;

class AttendancessController extends Controller
{
    
    public function index(Request $request)
    {
        $input = $request->all();
            
        $user2 = User::all(); 
        $fd = $request->input('fdate');
        $td = $request->input('tdate');
        $e = $request['employe'];

        $user =DB::table('attendance')
        ->select('attendance.*','users.first_name','users.last_name')
        ->leftJoin('users','attendance.emp_name','users.id')
        ->get();
        return view('attenmodule.index',compact('user','user2'));
       
    }

    
    public function create()
    {
        $user = User::all(); 
        return view('attenmodule.create',compact('user'));
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
        // print_r($input['total_tea_break']);die();

        $l_time = $request['lunch_break'];
        $le_time = $request['lunch_break_out'];
        $timestamp5 = strtotime($l_time);
        $timestamp6 = strtotime($le_time);
        $hours2 = abs($timestamp6 - $timestamp5);
        $time3 = date('H:i',$hours2);
        $input['total_lunch_break'] = $time3;
        // echo '<pre>';
        // print_r($input);die();

       
        $m_time = $request['meeting_break'];
        $me_time = $request['meeting_break_out'];
        $timestamp7 = strtotime($m_time);
        $timestamp8 = strtotime($me_time);
        $hours3 = abs($timestamp8 - $timestamp7);
        $time4 = date('H:i',$hours3);
        $input['total_meeting_break'] = $time4;
        Attendance::create($input);
        return redirect('attenmodule')->with('flash_message', 'Contact Addedd!'); 
    }

    
    // public function show($id)
    // {
    //     $ticket = ticket::find($id);
    //     return view('ticket.show')->with('ticket', $ticket);
    // }

    public function edit($id)
    {
         $attendance= Attendancess::find($id);
         return view('attenmodule',compact('attendance'));
    }


    public function update(Request $request, $id)
    {
      

        $attendance = Attendancess::find($id);
        $input = $request->all();
        $attendance->update($input);
        return redirect('attenmodule')->with('flash_message', 'attendance Updated!');  
    }


    public function destroy($id)
    {
        Attendancess::destroy($id);
        return redirect('attenmodule')->with('flash_message', 'Contact deleted!');
    }
}
