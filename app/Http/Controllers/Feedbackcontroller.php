<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\feedback;
use DB;
use App\Models\User;

class Feedbackcontroller extends Controller
{
   
    // public function index()
    // {
    //     $feedback = feedback::all();
    //     return view ('feedback.index')->with('feedback', $feedback);
    //     // return view ('feedback.index');
    // }
      public function index()
        {
            $feedback =DB::table('feedback')
            ->select('feedback.*','patient.first_name','patient.last_name')
            ->join('users as patient', 'feedback.patient_name', '=', 'patient.id')
            ->get();
            return view ('feedback.index',compact('feedback'));
        }
    

    
    // public function create()
    // {
    //     return view ('feedback.create');
    // }
    public function create(Request $request)
    {
        $patientref = User::where('department_id', '=', '3')->get();
        $user2 = User::all(); 
        
        return view ('feedback.create',compact('patientref','user2'));
    }

    public function patient_details(Request $request){
        $patien_detail = DB::table('users')
        ->select('phone')
        ->where('id',$request->id)
        ->first();
        return response()->json($patien_detail);
    }

    
    public function store(Request $request)
    {
        $input = $request->all();
        feedback::create($input);
        return redirect('feedback')->with('flash_message', 'Data Addedd!');  
    }

    
    public function show($id)
    {
        $feedback = feedback::find($id);
        return view('feedback.show')->with('feedback', $feedback);
    }


    public function edit($id)
    {
        $feedback = feedback::find($id);
        $feedback1 = DB::table('feedback')->where('id', $id)->get();
        return view('feedback.edit',compact('feedback','feedback1'));
    }


    public function update(Request $request, $id)
    {
        $feedback = feedback::find($id);
        $input = $request->all();
        $feedback->update($input);
        return redirect('feedback')->with('flash_message', 'feedback Updated!');  
    }


    public function destroy($id)
    {
        feedback::destroy($id);
        return redirect('feedback')->with('flash_message', 'Contact deleted!');  
    }
}
