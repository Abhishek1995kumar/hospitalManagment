<?php

namespace App\Http\Controllers;
use App\Models\pharmacybill;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Medicine;
use App\Models\Patienthms;

use Illuminate\Support\Facades\Validator;
use DB;
class PatienthmsController extends Controller
{
    function show ()
    {
        //$preot = Preot::all();
        $patienthms = DB::table('patienthms');
        // print_r($preot_pre);die();
        return view('patienthms.list')->with(compact('patienthms'));
    }


    function add (){

        $patienthms = Patienthms::all();
        return view('patienthms.add',compact('patienthms'));
    }

    
    function save (Request $request)
    {
       
        $validator = Validator::make($request->all(),[
            // 'patinet_id'=>'required',
            // 'diagnosis' => 'required',
            // 'investigation' => 'required',
            // 'investigation for' => 'required', 
            

        ]);
            if($validator->passes())
            {
              
                $patienthms=new patienthms;

                $patienthms->patient = $request['patient'];
                $patienthms->mobileno = $request['mobileno'];
                $patienthms->location= $request['location'];
                $patienthms->doctordepartments = $request['doctordepartments'];
                $patienthms->doctor = $request['doctor'];
                $patienthms->description = $request['description'];
                
  
                $resp =  $patienthms->save();
                $request->session()->flash('msg','Save Succesfully');
                return redirect('/patienthms');
            }
            else{
                return redirect('patienthms/add')->withErrors($validator)->withInput();

            }
    }
}

