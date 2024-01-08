<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Location;
use App\Models\Locationyearss;
use DB;

class Locationcontroller extends Controller
{
    function show () {

        $location = location::all();
        return view('location.list',compact('location'));  
    }


    function add (){
        $location = location::all();
        $country = DB::table('countries')->select('*')->get();
        $state = DB::table('states')->select('*')->get();
        $city = DB::table('cities')->select('*')->get();
        $locationyear=Locationyearss::all();
        return view('location.add',compact('location', 'country', 'state', 'city','locationyear'));
    }


    public function fetchState(Request $request){

        $state = DB::table('states')
                ->select('*')
                ->where("country_id",$request->country_id)
                ->pluck("name", "id");
        // return view('location.add',compact('state'));
        // // echo "<pre>";
        // // print_r($data);
        // dd($data);
        return response()->json($data);       
    }

    public function fetchCity(Request $request){
        
         $data = DB::table('cities')
                ->where("state_id",$request->state_id)
                ->pluck("name", "id");
        return response()->json($data);
    }

    function save (Request $request)
    {
        // $validator = Validator::make($request->all(),[
        $input = $request->all();
       // print_r($input);die();
       
        Location::create($input);
        return redirect('location')->with('flash_message', 'Contact Addedd!');  

    }

    public function deletelocation($id,Request $request){

        Location::where('id',$id)->delete();
        $request->session()->flash('msg','Record Has Been Delete Succesfully');
        return redirect('/location');
    }

    public function editlocation($id) {

        $location = Location::find($id);
        $country = DB::table('countries')->get();
        $state = DB::table('states')->get();
        $city = DB::table('cities')->get();
        return view('location.edit', compact('location','country','state','city'));

    }

    public function updatelocation($id,Request $request)
    {
        $Location = Location::find($id);
        $input = $request->all();
        $Location->update($input);
        return redirect('location')->with('flash_message', 'Location Updated!'); 
    }


    public function submityearform (Request $request)
    {
       
        $sublocation = new Locationyearss;
        $sublocation->locationyears = $request->locationyears;
        $sublocation->save();
        if($sublocation){
            $getlocationyears = Locationyearss::all();
        }
        return response()->json(['success'=>'Successfully', 'getlocationyears' => $getlocationyears]);

    }


    

        
        
       
}
